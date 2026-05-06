@extends('layouts.admin')

@section('title', 'Gestion des modules')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-bold text-gray-700">Liste des modules</h3>
        <a href="{{ route('admin.modules.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Ajouter</a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">Nom</th>
                    <th class="px-4 py-3 text-left">Code</th>
                    <th class="px-4 py-3 text-left">Crédits</th>
                    <th class="px-4 py-3 text-left">Professeur</th>
                    <th class="px-4 py-3 text-left">Groupe</th>
                    <th class="px-4 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($modules as $module)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 font-medium">{{ $module->nom }}</td>
                    <td class="px-4 py-3">
                        <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded text-xs">{{ $module->code }}</span>
                    </td>
                    <td class="px-4 py-3">{{ $module->credits }}</td>
                    <td class="px-4 py-3">{{ $module->professeur?->user?->name ?? 'Non assigné' }}</td>
                    <td class="px-4 py-3">{{ $module->groupe?->nom ?? 'Non assigné' }}</td>
                    <td class="px-4 py-3 flex gap-2">
                        <a href="{{ route('admin.modules.edit', $module) }}" class="bg-yellow-400 text-white px-3 py-1 rounded text-xs hover:bg-yellow-500">Modifier</a>
                        <form method="POST" action="{{ route('admin.modules.destroy', $module) }}" onsubmit="return confirm('Supprimer ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-4 py-3">
            {{ $modules->links() }}
        </div>
    </div>
@endsection