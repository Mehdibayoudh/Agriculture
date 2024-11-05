<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
    ];

    // Define relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define relationship to Ressources
    public function ressources()
    {
        return $this->belongsToMany(Ressource::class, 'wishlist_ressource');
    }
}
