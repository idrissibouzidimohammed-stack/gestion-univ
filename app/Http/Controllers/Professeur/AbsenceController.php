<?php

namespace App\Http\Controllers\Professeur;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use App\Models\Etudiant;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenceController extends Controller
{
    public function index()
    {
        $professeur = Auth::user()->professeur;
        $absences = Absence::with(['etudiant.user', 'module'])
            ->whereHas('module', fn($q) => $q->where('professeur_id', $professeur->id))
            ->orderBy('date', 'desc')
            ->paginate(15);
        return view('professeur.absences.index', compact('absences'));
    }

    public function create()
    {
        $professeur = Auth::user()->professeur;
        $modules = Module::where('professeur_id', $professeur->id)->get();
        $etudiants = Etudiant::with('user')->get();
        return view('professeur.absences.create', compact('modules', 'etudiants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'module_id' => 'required|exists:modules,id',
            'date' => 'required|date',
        ]);

        Absence::create([
            'etudiant_id' => $request->etudiant_id,
            'module_id' => $request->module_id,
            'date' => $request->date,
            'justifiee' => false,
        ]);

        return redirect()->route('professeur.absences.index')->with('success', 'Absence enregistrée avec succès.');
    }
}