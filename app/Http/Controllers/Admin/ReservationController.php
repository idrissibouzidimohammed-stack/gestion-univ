<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Salle;
use App\Models\Professeur;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['salle', 'professeur.user'])->orderBy('date', 'desc')->paginate(15);
        return view('admin.reservations.index', compact('reservations'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'statut' => 'required|in:validee,refusee',
        ]);

        $reservation->update(['statut' => $request->statut]);

        return redirect()->route('admin.reservations.index')->with('success', 'Réservation mise à jour.');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('admin.reservations.index')->with('success', 'Réservation supprimée.');
    }
}