<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'code', 'credits', 'professeur_id', 'groupe_id'];

    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }

    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }
}