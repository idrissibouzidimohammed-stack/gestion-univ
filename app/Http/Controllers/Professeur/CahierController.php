<?php

namespace App\Http\Controllers\Professeur;

use App\Http\Controllers\Controller;
use App\Models\CahierDeTexte;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CahierController extends Controller
{
    public function index()
    {
        $professeur = Auth::user()->professeur;
        $cahiers = CahierDeTexte::with('module')
            ->where('professeur_id', $professeur->id)
            ->orderBy('date', 'desc')
            ->paginate(15);
        return view('professeur.cahier.index', compact('cahiers'));
    }

    public function create()
    {
        $professeur = Auth::user()->professeur;
        $modules = Module::where('professeur_id', $professeur->id)->get();
        return view('professeur.cahier.create', compact('modules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'module_id' => 'required|exists:modules,id',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
            'objectif' => 'required|string',
            'type_seance' => 'required|in:cours,td,tp',
        ]);

        $professeur = Auth::user()->professeur;

        CahierDeTexte::create([
            'module_id' => $request->module_id,
            'professeur_id' => $professeur->id,
            'date' => now()->toDateString(),
            'heure_debut' => $request->heure_debut,
            'heure_fin' => $request->heure_fin,
            'objectif' => $request->objectif,
            'type_seance' => $request->type_seance,
        ]);

        return redirect()->route('professeur.cahier.index')->with('success', 'Séance ajoutée au cahier de textes.');
    }
}