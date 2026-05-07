@extends('layouts.professeur')

@section('title', 'Ajouter une séance')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-lg">
        <form method="POST" action="{{ route('professeur.cahier.store') }}">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                    <input type="text" value="{{ now()->format('d/m/Y') }}" class="w-full border rounded px-3 py-2 bg-gray-100" disabled>
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
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Heure début</label>
                        <input type="time" name="heure_debut" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Heure fin</label>
                        <input type="time" name="heure_fin" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Objectif de la séance</label>
                    <textarea name="objectif" rows="3" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Type de séance</label>
                    <select name="type_seance" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                        <option value="">-- Choisir --</option>
                        <option value="cours">Cours</option>
                        <option value="td">TD</option>
                        <option value="tp">TP</option>
                    </select>
                </div>
            </div>
            <div class="mt-6 flex gap-3">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">Enregistrer</button>
                <a href="{{ route('professeur.cahier.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">Annuler</a>
            </div>
        </form>
    </div>
@endsection