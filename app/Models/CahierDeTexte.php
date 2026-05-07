<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CahierDeTexte extends Model
{
    use HasFactory;

    protected $fillable = ['module_id', 'professeur_id', 'date', 'heure_debut', 'heure_fin', 'objectif', 'type_seance'];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }
}