@extends('layouts.admin')

@section('title', 'Modifier une séance')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-lg">
        <form method="POST" action="{{ route('admin.edt.update', $edt) }}">
            @csrf
            @method('PUT')

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Module</label>
                    <select name="module_id" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="">-- Choisir un module --</option>
                        @foreach($modules as $module)
                            <option value="{{ $module->id }}" {{ $edt->module_id == $module->id ? 'selected' : '' }}>{{ $module->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Groupe</label>
                    <select name="groupe_id" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="">-- Choisir un groupe --</option>
                        @foreach($groupes as $groupe)
                            <option value="{{ $groupe->id }}" {{ $edt->groupe_id == $groupe->id ? 'selected' : '' }}>{{ $groupe->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Salle</label>
                    <select name="salle_id" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="">-- Choisir une salle --</option>
                        @foreach($salles as $salle)
                            <option value="{{ $salle->id }}" {{ $edt->salle_id == $salle->id ? 'selected' : '' }}>{{ $salle->nom }} ({{ $salle->capacite }} places)</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jour</label>
                    <select name="jour" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="lundi" {{ $edt->jour == 'lundi' ? 'selected' : '' }}>Lundi</option>
                        <option value="mardi" {{ $edt->jour == 'mardi' ? 'selected' : '' }}>Mardi</option>
                        <option value="mercredi" {{ $edt->jour == 'mercredi' ? 'selected' : '' }}>Mercredi</option>
                        <option value="jeudi" {{ $edt->jour == 'jeudi' ? 'selected' : '' }}>Jeudi</option>
                        <option value="vendredi" {{ $edt->jour == 'vendredi' ? 'selected' : '' }}>Vendredi</option>
                        <option value="samedi" {{ $edt->jour == 'samedi' ? 'selected' : '' }}>Samedi</option>
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Heure début</label>
                        <input type="time" name="heure_debut" value="{{ substr($edt->heure_debut, 0, 5) }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Heure fin</label>
                        <input type="time" name="heure_fin" value="{{ substr($edt->heure_fin, 0, 5) }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Type de séance</label>
                    <select name="type" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="cours" {{ $edt->type == 'cours' ? 'selected' : '' }}>Cours</option>
                        <option value="td" {{ $edt->type == 'td' ? 'selected' : '' }}>TD</option>
                        <option value="tp" {{ $edt->type == 'tp' ? 'selected' : '' }}>TP</option>
                    </select>
                </div>
            </div>

            <div class="mt-6 flex gap-3">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Modifier</button>
                <a href="{{ route('admin.edt.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">Annuler</a>
            </div>
        </form>
    </div>
@endsection