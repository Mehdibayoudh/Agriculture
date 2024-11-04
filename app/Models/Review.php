<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'jardin_id',
        'user_id',
        'rating',
        'comment',
    ];

    // Relationships
    public function jardin()
    {
        return $this->belongsTo(Jardin::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
