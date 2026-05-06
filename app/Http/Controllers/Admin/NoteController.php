<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\Etudiant;
use App\Models\Module;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::with(['etudiant.user', 'module'])->paginate(15);
        return view('admin.notes.index', compact('notes'));
    }

    public function create()
    {
        $etudiants = Etudiant::with('user')->get();
        $modules = Module::all();
        return view('admin.notes.create', compact('etudiants', 'modules'));
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

        return redirect()->route('admin.notes.index')->with('success', 'Note enregistrée avec succès.');
    }

    public function edit(Note $note)
    {
        $etudiants = Etudiant::with('user')->get();
        $modules = Module::all();
        return view('admin.notes.edit', compact('note', 'etudiants', 'modules'));
    }

    public function update(Request $request, Note $note)
    {
        $request->validate([
            'cc1' => 'nullable|numeric|min:0|max:20',
            'cc2' => 'nullable|numeric|min:0|max:20',
            'examen' => 'nullable|numeric|min:0|max:20',
        ]);

        $cc1 = $request->cc1 ?? 0;
        $cc2 = $request->cc2 ?? 0;
        $examen = $request->examen ?? 0;
        $note_finale = (($cc1 + $cc2) / 2) * 0.4 + $examen * 0.6;

        $note->update([
            'cc1' => $cc1,
            'cc2' => $cc2,
            'examen' => $examen,
            'note_finale' => round($note_finale, 2),
        ]);

        return redirect()->route('admin.notes.index')->with('success', 'Note modifiée avec succès.');
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('admin.notes.index')->with('success', 'Note supprimée avec succès.');
    }
}