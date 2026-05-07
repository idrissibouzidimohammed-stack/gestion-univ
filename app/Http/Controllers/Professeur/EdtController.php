<?php

namespace App\Http\Controllers\Professeur;

use App\Http\Controllers\Controller;
use App\Models\EmploiDuTemps;
use Illuminate\Support\Facades\Auth;

class EdtController extends Controller
{
    public function index()
    {
        $professeur = Auth::user()->professeur;
        $edts = EmploiDuTemps::with(['module', 'salle', 'groupe'])
            ->whereHas('module', fn($q) => $q->where('professeur_id', $professeur->id))
            ->orderBy('jour')
            ->orderBy('heure_debut')
            ->get();
        return view('professeur.edt.index', compact('edts'));
    }
}