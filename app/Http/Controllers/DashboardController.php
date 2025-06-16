<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Post;

class DashboardController extends Controller
{
    /**
     * Display the main feed dashboard.
     */
    public function index(Request $request): View
    {
        $user = $request->user();
        
        // IDs de usuarios que sigue + el usuario actual
        $followingIds = $user->following()->pluck('following_id')->toArray();
        $feedUserIds = array_merge($followingIds, [$user->id]);
        
        // Posts del feed: usuarios seguidos + propios posts
        $feedPosts = Post::whereIn('user_id', $feedUserIds)
            ->with(['user', 'likes', 'comments.user'])
            ->withCount(['likes', 'comments'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        
        // Stats rápidas para el header
        $stats = [
            'total_posts' => count($feedUserIds) > 1 ? Post::whereIn('user_id', $feedUserIds)->count() : $user->posts()->count(),
            'following_count' => $user->following()->count(),
            'new_posts_today' => Post::whereIn('user_id', $feedUserIds)->whereDate('created_at', today())->count()
        ];
        
        return view('dashboard', [
            'user' => $user,
            'feedPosts' => $feedPosts,
            'stats' => $stats,
        ]);
    }
}
