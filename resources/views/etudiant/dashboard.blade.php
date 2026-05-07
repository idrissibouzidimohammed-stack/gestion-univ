@extends('layouts.etudiant')

@section('title', 'Tableau de bord')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-4 border-l-4 border-blue-500">
            <p class="text-sm text-gray-500">Mes notes</p>
            <p class="text-3xl font-bold text-blue-600">{{ $totalNotes }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 border-l-4 border-yellow-500">
            <p class="text-sm text-gray-500">Total absences</p>
            <p class="text-3xl font-bold text-yellow-600">{{ $totalAbsences }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 border-l-4 border-red-500">
            <p class="text-sm text-gray-500">Absences non justifiées</p>
            <p class="text-3xl font-bold text-red-600">{{ $absencesNonJustifiees }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="font-bold text-gray-700 mb-3">Accès rapides</h3>
            <div class="space-y-2">
                <a href="{{ route('etudiant.notes.index') }}" class="block px-4 py-2 bg-gray-100 rounded hover:bg-gray-200">📝 Consulter mes notes</a>
                <a href="{{ route('etudiant.absences.index') }}" class="block px-4 py-2 bg-gray-100 rounded hover:bg-gray-200">📅 Voir mes absences</a>
                <a href="{{ route('etudiant.edt.index') }}" class="block px-4 py-2 bg-gray-100 rounded hover:bg-gray-200">🗓️ Mon emploi du temps</a>
                <a href="{{ route('etudiant.demandes.create') }}" class="block px-4 py-2 bg-gray-100 rounded hover:bg-gray-200">📄 Faire une demande</a>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="font-bold text-gray-700 mb-3">Informations</h3>
            <p class="text-sm text-gray-500">Université Privée de Fès</p>
            <p class="text-sm text-gray-500">Filière : Génie Informatique</p>
            <p class="text-sm text-gray-500">Groupe : {{ auth()->user()->etudiant->groupe->nom ?? '-' }}</p>
            <p class="text-sm text-gray-500">Apogée : {{ auth()->user()->etudiant->apogee ?? '-' }}</p>
        </div>
    </div>
@endsection