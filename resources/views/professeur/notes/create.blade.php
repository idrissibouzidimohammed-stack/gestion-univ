@extends('layouts.professeur')

@section('title', 'Ajouter une note')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-lg">
        <form method="POST" action="{{ route('professeur.notes.store') }}">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Étudiant</label>
                    <select name="etudiant_id" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                        <option value="">-- Choisir --</option>
                        @foreach($etudiants as $etudiant)
                            <option value="{{ $etudiant->id }}">{{ $etudiant->user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Module</label>
                    <select name="module_id" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                        <option value="">-- Choisir --</option>
                        @foreach($modules as $module)
                            <option value="{{ $module->id }}">{{ $module->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">CC1 /20</label>
                        <input type="number" name="cc1" min="0" max="20" step="0.25" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">CC2 /20</label>
                        <input type="number" name="cc2" min="0" max="20" step="0.25" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Examen /20</label>
                        <input type="number" name="examen" min="0" max="20" step="0.25" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                </div>
                <div class="bg-gray-50 rounded p-3 text-sm text-gray-600">
                    📌 Note finale = ((CC1 + CC2) / 2) × 0.4 + Examen × 0.6
                </div>
            </div>
            <div class="mt-6 flex gap-3">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">Enregistrer</button>
                <a href="{{ route('professeur.notes.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">Annuler</a>
            </div>
        </form>
    </div>
@endsection