<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\Professeur;
use App\Models\Module;
use App\Models\DemandeAdministrative;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalEtudiants' => Etudiant::count(),
            'totalProfesseurs' => Professeur::count(),
            'totalModules' => Module::count(),
            'totalDemandes' => DemandeAdministrative::where('statut', 'en_attente')->count(),
        ]);
    }
}