<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Jardin extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional if it's the default 'jardins')
    protected $table = 'jardins';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'nom',
        'localisation',
        'type',
        'description',
        'surface',
        'etat',
        'utilisateur_id',
        'photo',
    ];

    // Enum for garden types
    const GARDEN_TYPES = [
        'Vegetable',
        'Fruit',
        'Flower',
        'Herb' ,
        'Mixed'
    ];


    public function reviews()
    {
        return $this->hasMany(Review::class);
    }


    // Define the relationship between Jardin and Utilisateur (one-to-many inverse)

    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'utilisateur_id');
    }


    // Define the relationship between Jardin and Plante (one-to-many)
    public function plantes()
    {
        return $this->hasMany(Plante::class);
    }

    // Define the relationship between Jardin and Évaluation (one-to-many)
    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}
