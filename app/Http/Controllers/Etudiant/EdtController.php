<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use App\Models\EmploiDuTemps;
use Illuminate\Support\Facades\Auth;

class EdtController extends Controller
{
    public function index()
    {
        $etudiant = Auth::user()->etudiant;
        $edts = EmploiDuTemps::with(['module', 'salle'])
            ->where('groupe_id', $etudiant->groupe_id)
            ->orderBy('jour')
            ->orderBy('heure_debut')
            ->get();
        return view('etudiant.edt.index', compact('edts'));
    }
}