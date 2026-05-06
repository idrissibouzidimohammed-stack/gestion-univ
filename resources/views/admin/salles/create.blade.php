@extends('layouts.admin')

@section('title', 'Ajouter une salle')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-lg">
        <form method="POST" action="{{ route('admin.salles.store') }}">
            @csrf

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nom de la salle</label>
                    <input type="text" name="nom" value="{{ old('nom') }}" placeholder="Ex: Salle A1" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    @error('nom') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Capacité</label>
                    <input type="number" name="capacite" value="{{ old('capacite', 30) }}" min="1" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    @error('capacite') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                    <select name="type" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="">-- Choisir --</option>
                        <option value="cours" {{ old('type') == 'cours' ? 'selected' : '' }}>Cours</option>
                        <option value="td" {{ old('type') == 'td' ? 'selected' : '' }}>TD</option>
                        <option value="tp" {{ old('type') == 'tp' ? 'selected' : '' }}>TP</option>
                        <option value="amphi" {{ old('type') == 'amphi' ? 'selected' : '' }}>Amphi</option>
                    </select>
                    @error('type') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="mt-6 flex gap-3">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Enregistrer</button>
                <a href="{{ route('admin.salles.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">Annuler</a>
            </div>
        </form>
    </div>
@endsection