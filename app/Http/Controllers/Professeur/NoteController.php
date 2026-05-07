<?php

namespace App\Http\Controllers\Professeur;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\Etudiant;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index()
    {
        $professeur = Auth::user()->professeur;
        $notes = Note::with(['etudiant.user', 'module'])
            ->whereHas('module', fn($q) => $q->where('professeur_id', $professeur->id))
            ->paginate(15);
        return view('professeur.notes.index', compact('notes'));
    }

    public function create()
    {
        $professeur = Auth::user()->professeur;
        $modules = Module::where('professeur_id', $professeur->id)->get();
        $etudiants = Etudiant::with('user')->get();
        return view('professeur.notes.create', compact('modules', 'etudiants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'module_id' => 'required|exists:modules,id',
            'cc1' => 'nullable|numeric|min:0|max:20',
            'cc2' => 'nullable|numeric|min:0|max:20',
            'examen' => 'nullable|numeric|min:0|max:20',
        ]);

        $cc1 = $request->cc1 ?? 0;
        $cc2 = $request->cc2 ?? 0;
        $examen = $request->examen ?? 0;
        $note_finale = (($cc1 + $cc2) / 2) * 0.4 + $examen * 0.6;

        Note::updateOrCreate(
            ['etudiant_id' => $request->etudiant_id, 'module_id' => $request->module_id],
            ['cc1' => $cc1, 'cc2' => $cc2, 'examen' => $examen, 'note_finale' => round($note_finale, 2)]
        );

        return redirect()->route('professeur.notes.index')->with('success', 'Note enregistrée avec succès.');
    }
}