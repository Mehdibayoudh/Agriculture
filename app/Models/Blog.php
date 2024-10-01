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
        'utilisateur_id'

    ];

    // Define the relationship between Blog and User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
