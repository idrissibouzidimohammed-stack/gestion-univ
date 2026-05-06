@extends('layouts.admin')

@section('title', 'Modifier un groupe')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-lg">
        <form method="POST" action="{{ route('admin.groupes.update', $groupe) }}">
            @csrf
            @method('PUT')

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nom du groupe</label>
                    <input type="text" name="nom" value="{{ old('nom', $groupe->nom) }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    @error('nom') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Filière</label>
                    <input type="text" name="filiere" value="{{ old('filiere', $groupe->filiere) }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    @error('filiere') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Année</label>
                    <select name="annee" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="">-- Choisir --</option>
                        <option value="1" {{ $groupe->annee == 1 ? 'selected' : '' }}>1ère année</option>
                        <option value="2" {{ $groupe->annee == 2 ? 'selected' : '' }}>2ème année</option>
                        <option value="3" {{ $groupe->annee == 3 ? 'selected' : '' }}>3ème année</option>
                        <option value="4" {{ $groupe->annee == 4 ? 'selected' : '' }}>4ème année</option>
                        <option value="5" {{ $groupe->annee == 5 ? 'selected' : '' }}>5ème année</option>
                    </select>
                    @error('annee') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="mt-6 flex gap-3">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Modifier</button>
                <a href="{{ route('admin.groupes.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">Annuler</a>
            </div>
        </form>
    </div>
@endsection