<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanteCategorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 
        'description', 
        'type_sol', 
        'cycle_de_vie', // Annuelle, bisannuelle, pérenne
        'utilisation', // Jardinage, médicinal, etc.
        'maladies_courantes', // Maladies courantes associées
        'image', // Image de la catégorie
    ];

    public function plantes()
    {
        return $this->hasMany(Plante::class, 'categorie_id');
    }
}
