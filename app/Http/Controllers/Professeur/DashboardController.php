<?php

namespace App\Http\Controllers\Professeur;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Absence;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $professeur = Auth::user()->professeur;
        $totalModules = Module::where('professeur_id', $professeur->id)->count();
        $totalAbsences = Absence::whereHas('module', fn($q) => $q->where('professeur_id', $professeur->id))->count();
        $totalReservations = Reservation::where('professeur_id', $professeur->id)->count();

        return view('professeur.dashboard', compact('totalModules', 'totalAbsences', 'totalReservations'));
    }
}