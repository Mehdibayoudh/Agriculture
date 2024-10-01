<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plante extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'type', 'besoins', 'jardin_id'];

    public function jardin()
    {
        return $this->belongsTo(Jardin::class);
    }
}
