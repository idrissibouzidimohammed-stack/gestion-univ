<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploiDuTemps extends Model
{
    use HasFactory;

    protected $fillable = ['module_id', 'salle_id', 'groupe_id', 'jour', 'heure_debut', 'heure_fin', 'type'];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function salle()
    {
        return $this->belongsTo(Salle::class);
    }

    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }
}