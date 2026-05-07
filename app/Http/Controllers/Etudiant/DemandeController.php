<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use App\Models\DemandeAdministrative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemandeController extends Controller
{
    public function index()
    {
        $demandes = DemandeAdministrative::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('etudiant.demandes.index', compact('demandes'));
    }

    public function create()
    {
        return view('etudiant.demandes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:attestation_scolarite,releve_notes,certificat_inscription',
            'details' => 'nullable|string',
        ]);

        DemandeAdministrative::create([
            'user_id' => Auth::id(),
            'type' => $request->type,
            'details' => $request->details,
            'statut' => 'en_attente',
        ]);

        return redirect()->route('etudiant.demandes.index')->with('success', 'Demande soumise avec succès.');
    }
}