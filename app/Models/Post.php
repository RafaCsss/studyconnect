<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content',
        'image',
    ];

    protected $with = ['user']; // Siempre cargar el usuario

    // Relación con usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con likes
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // Relación con comentarios
    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    // Verificar si un usuario le dio like
    public function isLikedBy($userId)
    {
        return $this->likes()->where('user_id', $userId)->exists();
    }

    // Contar likes
    public function getLikesCountAttribute()
    {
        return $this->likes()->count();
    }

    // Contar comentarios
    public function getCommentsCountAttribute()
    {
        return $this->comments()->count();
    }

    // Scope para posts del feed
    public function scopeFeed($query, $userId)
    {
        $followingIds = User::find($userId)->following()->pluck('users.id');
        $followingIds[] = $userId; // Incluir propios posts
        
        return $query->whereIn('user_id', $followingIds)->latest();
    }
}
