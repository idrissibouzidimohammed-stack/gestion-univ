@extends('layouts.admin')

@section('title', 'Gestion des groupes')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-bold text-gray-700">Liste des groupes</h3>
        <a href="{{ route('admin.groupes.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Ajouter</a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">Nom</th>
                    <th class="px-4 py-3 text-left">Filière</th>
                    <th class="px-4 py-3 text-left">Année</th>
                    <th class="px-4 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($groupes as $groupe)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 font-medium">{{ $groupe->nom }}</td>
                    <td class="px-4 py-3">{{ $groupe->filiere }}</td>
                    <td class="px-4 py-3">
                        <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded text-xs">{{ $groupe->annee }}ème année</span>
                    </td>
                    <td class="px-4 py-3 flex gap-2">
                        <a href="{{ route('admin.groupes.edit', $groupe) }}" class="bg-yellow-400 text-white px-3 py-1 rounded text-xs hover:bg-yellow-500">Modifier</a>
                        <form method="POST" action="{{ route('admin.groupes.destroy', $groupe) }}" onsubmit="return confirm('Supprimer ?')">
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
            {{ $groupes->links() }}
        </div>
    </div>
@endsection