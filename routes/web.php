<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\PostController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Verificación de BD
Route::get('/check-db', function () {
    $stats = [
        'users' => \App\Models\User::count(),
        'posts' => \App\Models\Post::count(),
        'likes' => \App\Models\Like::count(),
        'comments' => \App\Models\Comment::count(),
        'follows' => \App\Models\Follow::count(),
    ];
    
    return response()->json($stats);
});

// TEMPORAL: Mostrar todos los emails para testing
Route::get('/show-users', function () {
    $users = User::select('name', 'email', 'university', 'career')->get();
    
    $html = '<h1>👥 Usuarios StudyConnect</h1>';
    $html .= '<p><strong>Todos usan password:</strong> <code>password</code></p>';
    $html .= '<hr>';
    
    foreach ($users as $user) {
        $html .= '<div style="margin: 10px 0; padding: 10px; border: 1px solid #ccc;">';
        $html .= '<strong>' . $user->name . '</strong><br>';
        $html .= '<strong>Email:</strong> ' . $user->email . '<br>';
        $html .= '<strong>Universidad:</strong> ' . $user->university . '<br>';
        $html .= '<strong>Carrera:</strong> ' . $user->career;
        $html .= '</div>';
    }
    
    return $html;
});

// Dashboard (Feed Principal)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

// Perfil del usuario autenticado
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Sistema de usuarios y seguimiento
Route::middleware('auth')->group(function () {
    Route::get('/users', [FollowController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [FollowController::class, 'show'])->name('users.show');
    Route::post('/follow/{user}', [FollowController::class, 'follow'])->name('follow');
    Route::delete('/unfollow/{user}', [FollowController::class, 'unfollow'])->name('unfollow');
});

// Sistema de posts
Route::middleware('auth')->group(function () {
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

require __DIR__.'/auth.php';
