@extends('layouts.admin')

@section('title', 'Demandes administratives')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-bold text-gray-700">Liste des demandes</h3>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">Demandeur</th>
                    <th class="px-4 py-3 text-left">Type</th>
                    <th class="px-4 py-3 text-left">Statut</th>
                    <th class="px-4 py-3 text-left">Date</th>
                    <th class="px-4 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($demandes as $demande)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $demande->user->name }}</td>
                    <td class="px-4 py-3 capitalize">{{ str_replace('_', ' ', $demande->type) }}</td>
                    <td class="px-4 py-3">
                        @if($demande->statut === 'en_attente')
                            <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs">En attente</span>
                        @elseif($demande->statut === 'validee')
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Validée</span>
                        @else
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs">Refusée</span>
                        @endif
                    </td>
                    <td class="px-4 py-3">{{ $demande->created_at->format('d/m/Y') }}</td>
                    <td class="px-4 py-3">
                        @if($demande->statut === 'en_attente')
                            <form method="POST" action="{{ route('admin.demandes.update', $demande) }}" class="flex gap-2">
                                @csrf
                                @method('PUT')
                                <button type="submit" name="statut" value="validee" class="bg-green-500 text-white px-3 py-1 rounded text-xs hover:bg-green-600">Valider</button>
                                <button type="submit" name="statut" value="refusee" class="bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600">Refuser</button>
                            </form>
                        @else
                            <span class="text-gray-400 text-xs">Traitée</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-6 text-center text-gray-500">Aucune demande</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-4 py-3">
            {{ $demandes->links() }}
        </div>
    </div>
@endsection