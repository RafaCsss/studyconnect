<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use App\Models\Follow;

class FollowController extends Controller
{
    /**
     * Display a listing of users to explore/follow.
     */
    public function index(Request $request): View
    {
        $currentUser = $request->user();
        $search = $request->get('search');
        $university = $request->get('university');
        $career = $request->get('career');
        
        // Query base: todos los usuarios excepto el actual
        $query = User::where('id', '!=', $currentUser->id)
                    ->withCount(['posts', 'followers', 'following']);
        
        // Aplicar filtros
        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        }
        
        if ($university) {
            $query->where('university', $university);
        }
        
        if ($career) {
            $query->where('career', 'LIKE', "%{$career}%");
        }
        
        $users = $query->latest()->paginate(12);
        
        // Obtener opciones para filtros
        $universities = User::select('university')
                           ->distinct()
                           ->whereNotNull('university')
                           ->pluck('university')
                           ->sort();
                           
        $careers = User::select('career')
                      ->distinct()
                      ->whereNotNull('career')
                      ->pluck('career')
                      ->sort();
        
        // IDs de usuarios que ya sigue
        $followingIds = $currentUser->following()->pluck('following_id')->toArray();
        
        return view('users.index', [
            'users' => $users,
            'universities' => $universities,
            'careers' => $careers,
            'followingIds' => $followingIds,
            'search' => $search,
            'selectedUniversity' => $university,
            'selectedCareer' => $career,
        ]);
    }
    
    /**
     * Show a specific user's profile.
     */
    public function show(Request $request, User $user): View
    {
        $currentUser = $request->user();
        
        // No permitir ver tu propio perfil por esta ruta
        if ($user->id === $currentUser->id) {
            return redirect()->route('profile.show');
        }
        
        // Cargar posts del usuario con stats
        $posts = $user->posts()
                     ->with(['likes', 'comments.user'])
                     ->withCount(['likes', 'comments'])
                     ->latest()
                     ->paginate(10);
        
        // Stats del usuario
        $stats = [
            'posts_count' => $user->posts()->count(),
            'followers_count' => $user->followers()->count(),
            'following_count' => $user->following()->count(),
            'likes_received' => $user->posts()->withCount('likes')->get()->sum('likes_count'),
        ];
        
        // Verificar si ya lo sigue
        $isFollowing = $currentUser->isFollowing($user->id);
        
        return view('users.show', [
            'user' => $user,
            'posts' => $posts,
            'stats' => $stats,
            'isFollowing' => $isFollowing,
            'currentUser' => $currentUser,
        ]);
    }
    
    /**
     * Follow a user.
     */
    public function follow(Request $request, User $user): JsonResponse
    {
        $currentUser = $request->user();
        
        // No puedes seguirte a ti mismo
        if ($user->id === $currentUser->id) {
            return response()->json(['error' => 'No puedes seguirte a ti mismo'], 400);
        }
        
        // Verificar si ya lo sigue
        if ($currentUser->isFollowing($user->id)) {
            return response()->json(['error' => 'Ya sigues a este usuario'], 400);
        }
        
        // Crear el follow
        $currentUser->following()->attach($user->id);
        
        // Obtener stats actualizadas
        $stats = [
            'followers_count' => $user->followers()->count(),
            'following_count' => $currentUser->following()->count(),
        ];
        
        return response()->json([
            'success' => true,
            'message' => "Ahora sigues a {$user->name}",
            'stats' => $stats,
        ]);
    }
    
    /**
     * Unfollow a user.
     */
    public function unfollow(Request $request, User $user): JsonResponse
    {
        $currentUser = $request->user();
        
        // Verificar si realmente lo sigue
        if (!$currentUser->isFollowing($user->id)) {
            return response()->json(['error' => 'No sigues a este usuario'], 400);
        }
        
        // Eliminar el follow
        $currentUser->following()->detach($user->id);
        
        // Obtener stats actualizadas
        $stats = [
            'followers_count' => $user->followers()->count(),
            'following_count' => $currentUser->following()->count(),
        ];
        
        return response()->json([
            'success' => true,
            'message' => "Dejaste de seguir a {$user->name}",
            'stats' => $stats,
        ]);
    }
}
