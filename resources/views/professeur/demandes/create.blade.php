@extends('layouts.professeur')

@section('title', 'Nouvelle demande')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-lg">
        <form method="POST" action="{{ route('professeur.demandes.store') }}">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Type de demande</label>
                    <select name="type" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                        <option value="">-- Choisir --</option>
                        <option value="attestation_travail">Attestation de travail</option>
                        <option value="ordre_mission">Ordre de mission</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Détails (optionnel)</label>
                    <textarea name="details" rows="4" placeholder="Précisez votre demande..." class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
                </div>
            </div>
            <div class="mt-6 flex gap-3">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">Soumettre</button>
                <a href="{{ route('professeur.demandes.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">Annuler</a>
            </div>
        </form>
    </div>
@endsection