<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmploiDuTemps;
use App\Models\Module;
use App\Models\Salle;
use App\Models\Groupe;
use Illuminate\Http\Request;

class EdtController extends Controller
{
    public function index()
    {
        $edts = EmploiDuTemps::with(['module', 'salle', 'groupe'])->orderBy('jour')->orderBy('heure_debut')->paginate(15);
        return view('admin.edt.index', compact('edts'));
    }

    public function create()
    {
        $modules = Module::all();
        $salles = Salle::all();
        $groupes = Groupe::all();
        return view('admin.edt.create', compact('modules', 'salles', 'groupes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'module_id' => 'required|exists:modules,id',
            'salle_id' => 'required|exists:salles,id',
            'groupe_id' => 'required|exists:groupes,id',
            'jour' => 'required|in:lundi,mardi,mercredi,jeudi,vendredi,samedi',
            'heure_debut' => 'required',
            'heure_fin' => 'required|after:heure_debut',
            'type' => 'required|in:cours,td,tp',
        ]);

        EmploiDuTemps::create($request->all());

        return redirect()->route('admin.edt.index')->with('success', 'Séance ajoutée avec succès.');
    }

    public function edit(EmploiDuTemps $edt)
    {
        $modules = Module::all();
        $salles = Salle::all();
        $groupes = Groupe::all();
        return view('admin.edt.edit', compact('edt', 'modules', 'salles', 'groupes'));
    }

    public function update(Request $request, EmploiDuTemps $edt)
    {
        $request->validate([
            'module_id' => 'required|exists:modules,id',
            'salle_id' => 'required|exists:salles,id',
            'groupe_id' => 'required|exists:groupes,id',
            'jour' => 'required|in:lundi,mardi,mercredi,jeudi,vendredi,samedi',
            'heure_debut' => 'required',
            'heure_fin' => 'required|after:heure_debut',
            'type' => 'required|in:cours,td,tp',
        ]);

        $edt->update($request->all());

        return redirect()->route('admin.edt.index')->with('success', 'Séance modifiée avec succès.');
    }

    public function destroy(EmploiDuTemps $edt)
    {
        $edt->delete();
        return redirect()->route('admin.edt.index')->with('success', 'Séance supprimée avec succès.');
    }
}