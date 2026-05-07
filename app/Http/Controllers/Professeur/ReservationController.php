<?php

namespace App\Http\Controllers\Professeur;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        $professeur = Auth::user()->professeur;
        $reservations = Reservation::with('salle')
            ->where('professeur_id', $professeur->id)
            ->orderBy('date', 'desc')
            ->paginate(10);
        return view('professeur.reservations.index', compact('reservations'));
    }

    public function create()
    {
        $salles = Salle::all();
        return view('professeur.reservations.create', compact('salles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'salle_id' => 'required|exists:salles,id',
            'date' => 'required|date|after_or_equal:today',
            'heure_debut' => 'required',
            'heure_fin' => 'required|after:heure_debut',
            'motif' => 'nullable|string',
        ]);

        $professeur = Auth::user()->professeur;

        $conflit = Reservation::where('salle_id', $request->salle_id)
            ->where('date', $request->date)
            ->where('statut', '!=', 'refusee')
            ->where(function($q) use ($request) {
                $q->whereBetween('heure_debut', [$request->heure_debut, $request->heure_fin])
                  ->orWhereBetween('heure_fin', [$request->heure_debut, $request->heure_fin]);
            })->exists();

        if ($conflit) {
            return back()->with('error', 'Cette salle est déjà réservée sur ce créneau.');
        }

        Reservation::create([
            'salle_id' => $request->salle_id,
            'professeur_id' => $professeur->id,
            'date' => $request->date,
            'heure_debut' => $request->heure_debut,
            'heure_fin' => $request->heure_fin,
            'motif' => $request->motif,
            'statut' => 'en_attente',
        ]);

        return redirect()->route('professeur.reservations.index')->with('success', 'Réservation soumise avec succès.');
    }
}