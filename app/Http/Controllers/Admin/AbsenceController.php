<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use App\Models\Etudiant;
use App\Models\Module;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    public function index()
    {
        $absences = Absence::with(['etudiant.user', 'module'])->orderBy('date', 'desc')->paginate(15);
        return view('admin.absences.index', compact('absences'));
    }

    public function create()
    {
        $etudiants = Etudiant::with('user')->get();
        $modules = Module::all();
        return view('admin.absences.create', compact('etudiants', 'modules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'module_id' => 'required|exists:modules,id',
            'date' => 'required|date',
            'justifiee' => 'boolean',
        ]);

        Absence::create([
            'etudiant_id' => $request->etudiant_id,
            'module_id' => $request->module_id,
            'date' => $request->date,
            'justifiee' => $request->has('justifiee'),
        ]);

        return redirect()->route('admin.absences.index')->with('success', 'Absence enregistrée avec succès.');
    }

    public function update(Request $request, Absence $absence)
    {
        $absence->update([
            'justifiee' => $request->has('justifiee'),
            'justificatif' => $request->justificatif,
        ]);

        return redirect()->route('admin.absences.index')->with('success', 'Absence mise à jour avec succès.');
    }

    public function destroy(Absence $absence)
    {
        $absence->delete();
        return redirect()->route('admin.absences.index')->with('success', 'Absence supprimée avec succès.');
    }
}