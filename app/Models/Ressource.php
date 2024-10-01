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

    // Simulate enum by using constant arrays
    const TYPES = ['naturelle', 'materielle'];
    const DISPONIBILITE = ['disponible', 'reservé', 'indisponible'];

    // user relation
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // function to check if a type is valid
    public static function isValidType($type)
    {
        return in_array($type, self::TYPES);
    }

    // function to check if disponibilité is valid
    public static function isValidDisponibilite($disponibilité)
    {
        return in_array($disponibilité, self::DISPONIBILITE);
    }
}
