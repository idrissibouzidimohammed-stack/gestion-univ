@extends('layouts.etudiant')

@section('title', 'Nouvelle demande')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-lg">
        <form method="POST" action="{{ route('etudiant.demandes.store') }}">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Type de demande</label>
                    <select name="type" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="">-- Choisir --</option>
                        <option value="attestation_scolarite">Attestation de scolarité</option>
                        <option value="releve_notes">Relevé de notes</option>
                        <option value="certificat_inscription">Certificat d'inscription</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Détails (optionnel)</label>
                    <textarea name="details" rows="4" placeholder="Précisez votre demande..." class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>
            </div>
            <div class="mt-6 flex gap-3">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Soumettre</button>
                <a href="{{ route('etudiant.demandes.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">Annuler</a>
            </div>
        </form>
    </div>
@endsection