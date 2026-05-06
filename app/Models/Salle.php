<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'capacite', 'type'];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function emploiDuTemps()
    {
        return $this->hasMany(EmploiDuTemps::class);
    }
}