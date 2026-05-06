<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['salle_id', 'professeur_id', 'date', 'heure_debut', 'heure_fin', 'motif', 'statut'];

    public function salle()
    {
        return $this->belongsTo(Salle::class);
    }

    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }
}