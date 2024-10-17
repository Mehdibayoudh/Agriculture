<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ressource extends Model
{
    use HasFactory;

    // Define fillable attributes
    protected $fillable = [
        'titre',
        'type',
        'description',
        'disponibilité',
        'image',
        'user_id'
    ];


    // user relation
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
