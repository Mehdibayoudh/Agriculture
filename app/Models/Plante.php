<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PlanteCategorie;

class Plante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 
        'description', 
        'besoins_eau', 
        'image', 
        'categorie_id',
        'jardin_id'
        ];

    public function jardin()
    {
        return $this->belongsTo(Jardin::class);
    }

    public function categorie()
    {
        return $this->belongsTo(PlanteCategorie::class, 'categorie_id');
    }
}
