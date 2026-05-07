<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Etudiant\DashboardController as EtudiantDashboard;
use App\Http\Controllers\Professeur\DashboardController as ProfesseurDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\GroupeController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\NoteController;
use App\Http\Controllers\Admin\AbsenceController;
use App\Http\Controllers\Admin\SalleController;
use App\Http\Controllers\Admin\EdtController;
use App\Http\Controllers\Admin\DemandeController;
use App\Http\Controllers\Admin\ReservationController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Routes Etudiant
Route::middleware(['auth', 'role:etudiant'])->prefix('etudiant')->name('etudiant.')->group(function () {
    Route::get('/dashboard', [EtudiantDashboard::class, 'index'])->name('dashboard');
});

// Routes Professeur
Route::middleware(['auth', 'role:professeur'])->prefix('professeur')->name('professeur.')->group(function () {
    Route::get('/dashboard', [ProfesseurDashboard::class, 'index'])->name('dashboard');
    Route::resource('notes', \App\Http\Controllers\Professeur\NoteController::class);
    Route::resource('absences', \App\Http\Controllers\Professeur\AbsenceController::class);
    Route::resource('cahier', \App\Http\Controllers\Professeur\CahierController::class);
    Route::resource('edt', \App\Http\Controllers\Professeur\EdtController::class);
    Route::resource('reservations', \App\Http\Controllers\Professeur\ReservationController::class);
    Route::resource('demandes', \App\Http\Controllers\Professeur\DemandeController::class);
});

// Routes Admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('groupes', GroupeController::class);
    Route::resource('modules', ModuleController::class);
    Route::resource('notes', NoteController::class);
    Route::resource('absences', AbsenceController::class);
    Route::resource('salles', SalleController::class);
    Route::resource('edt', EdtController::class);
    Route::resource('demandes', DemandeController::class);
    Route::resource('reservations', ReservationController::class);
});

require __DIR__.'/auth.php';