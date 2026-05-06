@extends('layouts.admin')

@section('title', 'Gestion des salles')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-bold text-gray-700">Liste des salles</h3>
        <a href="{{ route('admin.salles.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Ajouter</a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">Nom</th>
                    <th class="px-4 py-3 text-left">Capacité</th>
                    <th class="px-4 py-3 text-left">Type</th>
                    <th class="px-4 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($salles as $salle)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 font-medium">{{ $salle->nom }}</td>
                    <td class="px-4 py-3">{{ $salle->capacite }} places</td>
                    <td class="px-4 py-3">
                        @if($salle->type === 'amphi')
                            <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded text-xs">Amphi</span>
                        @elseif($salle->type === 'tp')
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">TP</span>
                        @elseif($salle->type === 'td')
                            <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs">TD</span>
                        @else
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Cours</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 flex gap-2">
                        <a href="{{ route('admin.salles.edit', $salle) }}" class="bg-yellow-400 text-white px-3 py-1 rounded text-xs hover:bg-yellow-500">Modifier</a>
                        <form method="POST" action="{{ route('admin.salles.destroy', $salle) }}" onsubmit="return confirm('Supprimer ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-4 py-6 text-center text-gray-500">Aucune salle enregistrée</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-4 py-3">
            {{ $salles->links() }}
        </div>
    </div>
@endsection