<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Store a newly created post in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $post = Post::create([
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', '¡Post creado exitosamente! 🎉');
    }

    /**
     * Remove the specified post from storage.
     */
    public function destroy(Post $post)
    {
        // Verificar que el usuario es el dueño del post
        if ($post->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'No puedes eliminar este post.');
        }

        $post->delete();

        return redirect()->back()->with('success', 'Post eliminado correctamente.');
    }
}
