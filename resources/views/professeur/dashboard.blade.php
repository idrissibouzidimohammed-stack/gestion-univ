@extends('layouts.professeur')

@section('title', 'Tableau de bord')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-4 border-l-4 border-green-500">
            <p class="text-sm text-gray-500">Mes modules</p>
            <p class="text-3xl font-bold text-green-600">{{ $totalModules }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 border-l-4 border-yellow-500">
            <p class="text-sm text-gray-500">Absences enregistrées</p>
            <p class="text-3xl font-bold text-yellow-600">{{ $totalAbsences }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 border-l-4 border-blue-500">
            <p class="text-sm text-gray-500">Mes réservations</p>
            <p class="text-3xl font-bold text-blue-600">{{ $totalReservations }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="font-bold text-gray-700 mb-3">Accès rapides</h3>
            <div class="space-y-2">
                <a href="{{ route('professeur.notes.index') }}" class="block px-4 py-2 bg-gray-100 rounded hover:bg-gray-200">📝 Saisir des notes</a>
                <a href="{{ route('professeur.absences.index') }}" class="block px-4 py-2 bg-gray-100 rounded hover:bg-gray-200">📅 Gérer les absences</a>
                <a href="{{ route('professeur.cahier.index') }}" class="block px-4 py-2 bg-gray-100 rounded hover:bg-gray-200">📖 Cahier de textes</a>
                <a href="{{ route('professeur.reservations.index') }}" class="block px-4 py-2 bg-gray-100 rounded hover:bg-gray-200">🔑 Réserver une salle</a>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="font-bold text-gray-700 mb-3">Informations</h3>
            <p class="text-sm text-gray-500">Université Privée de Fès</p>
            <p class="text-sm text-gray-500">Année : 2025 / 2026</p>
            <p class="text-sm text-gray-500">Spécialité : {{ auth()->user()->professeur->specialite ?? '-' }}</p>
        </div>
    </div>
@endsection