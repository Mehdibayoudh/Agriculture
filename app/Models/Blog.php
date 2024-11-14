<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'image',
        'content',
        'date',
        'utilisateur_id'

    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    // Define the relationship between Blog and User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
