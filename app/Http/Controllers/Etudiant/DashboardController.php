<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\Absence;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $etudiant = Auth::user()->etudiant;
        $totalNotes = Note::where('etudiant_id', $etudiant->id)->count();
        $totalAbsences = Absence::where('etudiant_id', $etudiant->id)->count();
        $absencesNonJustifiees = Absence::where('etudiant_id', $etudiant->id)->where('justifiee', false)->count();

        return view('etudiant.dashboard', compact('totalNotes', 'totalAbsences', 'absencesNonJustifiees'));
    }
}