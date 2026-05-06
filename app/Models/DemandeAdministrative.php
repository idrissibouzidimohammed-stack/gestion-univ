<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeAdministrative extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'type', 'statut', 'motif_refus', 'document_pdf', 'details'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}