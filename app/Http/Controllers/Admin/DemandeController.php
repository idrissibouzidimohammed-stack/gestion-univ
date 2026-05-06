<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DemandeAdministrative;
use Illuminate\Http\Request;

class DemandeController extends Controller
{
    public function index()
    {
        $demandes = DemandeAdministrative::with('user')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.demandes.index', compact('demandes'));
    }

    public function update(Request $request, DemandeAdministrative $demande)
    {
        $request->validate([
            'statut' => 'required|in:validee,refusee',
            'motif_refus' => 'nullable|string',
        ]);

        $demande->update([
            'statut' => $request->statut,
            'motif_refus' => $request->motif_refus,
        ]);

        return redirect()->route('admin.demandes.index')->with('success', 'Demande mise à jour avec succès.');
    }

    public function destroy(DemandeAdministrative $demande)
    {
        $demande->delete();
        return redirect()->route('admin.demandes.index')->with('success', 'Demande supprimée avec succès.');
    }
}