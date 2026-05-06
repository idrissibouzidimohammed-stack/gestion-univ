<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Groupe;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    public function index()
    {
        $groupes = Groupe::paginate(10);
        return view('admin.groupes.index', compact('groupes'));
    }

    public function create()
    {
        return view('admin.groupes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'filiere' => 'required|string|max:255',
            'annee' => 'required|integer|min:1|max:5',
        ]);

        Groupe::create($request->all());

        return redirect()->route('admin.groupes.index')->with('success', 'Groupe créé avec succès.');
    }

    public function edit(Groupe $groupe)
    {
        return view('admin.groupes.edit', compact('groupe'));
    }

    public function update(Request $request, Groupe $groupe)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'filiere' => 'required|string|max:255',
            'annee' => 'required|integer|min:1|max:5',
        ]);

        $groupe->update($request->all());

        return redirect()->route('admin.groupes.index')->with('success', 'Groupe modifié avec succès.');
    }

    public function destroy(Groupe $groupe)
    {
        $groupe->delete();
        return redirect()->route('admin.groupes.index')->with('success', 'Groupe supprimé avec succès.');
    }
}