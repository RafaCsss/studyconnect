<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $fillable = [
        'follower_id',
        'following_id',
    ];

    // Solo usamos created_at, no updated_at
    public $timestamps = false;
    protected $dates = ['created_at'];

    // Usuario que sigue
    public function follower()
    {
        return $this->belongsTo(User::class, 'follower_id');
    }

    // Usuario seguido
    public function following()
    {
        return $this->belongsTo(User::class, 'following_id');
    }
}
