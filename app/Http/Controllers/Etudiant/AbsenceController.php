<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use Illuminate\Support\Facades\Auth;

class AbsenceController extends Controller
{
    public function index()
    {
        $etudiant = Auth::user()->etudiant;
        $absences = Absence::with('module')
            ->where('etudiant_id', $etudiant->id)
            ->orderBy('date', 'desc')
            ->get();
        $total = $absences->count();
        $justifiees = $absences->where('justifiee', true)->count();
        $nonJustifiees = $absences->where('justifiee', false)->count();
        return view('etudiant.absences.index', compact('absences', 'total', 'justifiees', 'nonJustifiees'));
    }
}