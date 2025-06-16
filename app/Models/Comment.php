<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'user_id',
        'content',
    ];

    protected $with = ['user']; // Siempre cargar el usuario

    // Relación con post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Relación con usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
