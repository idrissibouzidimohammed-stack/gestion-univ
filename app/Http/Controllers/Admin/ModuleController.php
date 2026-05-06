<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Professeur;
use App\Models\Groupe;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::with(['professeur.user', 'groupe'])->paginate(10);
        return view('admin.modules.index', compact('modules'));
    }

    public function create()
    {
        $professeurs = Professeur::with('user')->get();
        $groupes = Groupe::all();
        return view('admin.modules.create', compact('professeurs', 'groupes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'code' => 'required|string|unique:modules',
            'credits' => 'required|integer|min:1',
            'professeur_id' => 'nullable|exists:professeurs,id',
            'groupe_id' => 'nullable|exists:groupes,id',
        ]);

        Module::create($request->all());

        return redirect()->route('admin.modules.index')->with('success', 'Module créé avec succès.');
    }

    public function edit(Module $module)
    {
        $professeurs = Professeur::with('user')->get();
        $groupes = Groupe::all();
        return view('admin.modules.edit', compact('module', 'professeurs', 'groupes'));
    }

    public function update(Request $request, Module $module)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'code' => 'required|string|unique:modules,code,'.$module->id,
            'credits' => 'required|integer|min:1',
            'professeur_id' => 'nullable|exists:professeurs,id',
            'groupe_id' => 'nullable|exists:groupes,id',
        ]);

        $module->update($request->all());

        return redirect()->route('admin.modules.index')->with('success', 'Module modifié avec succès.');
    }

    public function destroy(Module $module)
    {
        $module->delete();
        return redirect()->route('admin.modules.index')->with('success', 'Module supprimé avec succès.');
    }
}