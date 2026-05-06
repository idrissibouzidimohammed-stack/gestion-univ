@extends('layouts.admin')

@section('title', 'Tableau de bord')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-4 border-l-4 border-blue-500">
            <p class="text-sm text-gray-500">Étudiants</p>
            <p class="text-3xl font-bold text-blue-600">{{ $totalEtudiants }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 border-l-4 border-green-500">
            <p class="text-sm text-gray-500">Professeurs</p>
            <p class="text-3xl font-bold text-green-600">{{ $totalProfesseurs }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 border-l-4 border-yellow-500">
            <p class="text-sm text-gray-500">Modules</p>
            <p class="text-3xl font-bold text-yellow-600">{{ $totalModules }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 border-l-4 border-red-500">
            <p class="text-sm text-gray-500">Demandes en attente</p>
            <p class="text-3xl font-bold text-red-600">{{ $totalDemandes }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="font-bold text-gray-700 mb-3">Accès rapides</h3>
            <div class="space-y-2">
                <a href="{{ route('admin.users.index') }}" class="block px-4 py-2 bg-gray-100 rounded hover:bg-gray-200">👥 Gérer les utilisateurs</a>
                <a href="{{ route('admin.notes.index') }}" class="block px-4 py-2 bg-gray-100 rounded hover:bg-gray-200">📝 Gérer les notes</a>
                <a href="{{ route('admin.edt.index') }}" class="block px-4 py-2 bg-gray-100 rounded hover:bg-gray-200">🗓️ Gérer l'emploi du temps</a>
                <a href="{{ route('admin.demandes.index') }}" class="block px-4 py-2 bg-gray-100 rounded hover:bg-gray-200">📄 Valider les demandes</a>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="font-bold text-gray-700 mb-3">Informations</h3>
            <p class="text-sm text-gray-500">Université Privée de Fès</p>
            <p class="text-sm text-gray-500">Filière : Génie Informatique</p>
            <p class="text-sm text-gray-500">Année : 2025 / 2026</p>
        </div>
    </div>
@endsection