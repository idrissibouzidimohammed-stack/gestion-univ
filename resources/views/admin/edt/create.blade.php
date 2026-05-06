@extends('layouts.admin')

@section('title', 'Ajouter une séance')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-lg">
        <form method="POST" action="{{ route('admin.edt.store') }}">
            @csrf

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Module</label>
                    <select name="module_id" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="">-- Choisir un module --</option>
                        @foreach($modules as $module)
                            <option value="{{ $module->id }}" {{ old('module_id') == $module->id ? 'selected' : '' }}>{{ $module->nom }}</option>
                        @endforeach
                    </select>
                    @error('module_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Groupe</label>
                    <select name="groupe_id" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="">-- Choisir un groupe --</option>
                        @foreach($groupes as $groupe)
                            <option value="{{ $groupe->id }}" {{ old('groupe_id') == $groupe->id ? 'selected' : '' }}>{{ $groupe->nom }}</option>
                        @endforeach
                    </select>
                    @error('groupe_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Salle</label>
                    <select name="salle_id" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="">-- Choisir une salle --</option>
                        @foreach($salles as $salle)
                            <option value="{{ $salle->id }}" {{ old('salle_id') == $salle->id ? 'selected' : '' }}>{{ $salle->nom }} ({{ $salle->capacite }} places)</option>
                        @endforeach
                    </select>
                    @error('salle_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jour</label>
                    <select name="jour" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="">-- Choisir un jour --</option>
                        <option value="lundi" {{ old('jour') == 'lundi' ? 'selected' : '' }}>Lundi</option>
                        <option value="mardi" {{ old('jour') == 'mardi' ? 'selected' : '' }}>Mardi</option>
                        <option value="mercredi" {{ old('jour') == 'mercredi' ? 'selected' : '' }}>Mercredi</option>
                        <option value="jeudi" {{ old('jour') == 'jeudi' ? 'selected' : '' }}>Jeudi</option>
                        <option value="vendredi" {{ old('jour') == 'vendredi' ? 'selected' : '' }}>Vendredi</option>
                        <option value="samedi" {{ old('jour') == 'samedi' ? 'selected' : '' }}>Samedi</option>
                    </select>
                    @error('jour') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Heure début</label>
                        <input type="time" name="heure_debut" value="{{ old('heure_debut') }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        @error('heure_debut') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Heure fin</label>
                        <input type="time" name="heure_fin" value="{{ old('heure_fin') }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        @error('heure_fin') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Type de séance</label>
                    <select name="type" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="">-- Choisir --</option>
                        <option value="cours" {{ old('type') == 'cours' ? 'selected' : '' }}>Cours</option>
                        <option value="td" {{ old('type') == 'td' ? 'selected' : '' }}>TD</option>
                        <option value="tp" {{ old('type') == 'tp' ? 'selected' : '' }}>TP</option>
                    </select>
                    @error('type') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="mt-6 flex gap-3">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Enregistrer</button>
                <a href="{{ route('admin.edt.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">Annuler</a>
            </div>
        </form>
    </div>
@endsection