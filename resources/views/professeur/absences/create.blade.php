@extends('layouts.professeur')

@section('title', 'Ajouter une absence')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-lg">
        <form method="POST" action="{{ route('professeur.absences.store') }}">
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
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                    <input type="date" name="date" value="{{ date('Y-m-d') }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                </div>
            </div>
            <div class="mt-6 flex gap-3">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">Enregistrer</button>
                <a href="{{ route('professeur.absences.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">Annuler</a>
            </div>
        </form>
    </div>
@endsection