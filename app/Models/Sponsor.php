<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'industry',
        'phone',
    ];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_sponsor');
    }
}
