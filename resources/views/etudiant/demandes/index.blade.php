@extends('layouts.etudiant')

@section('title', 'Mes demandes')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-bold text-gray-700">Mes demandes administratives</h3>
        <a href="{{ route('etudiant.demandes.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Nouvelle demande</a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">Type</th>
                    <th class="px-4 py-3 text-left">Statut</th>
                    <th class="px-4 py-3 text-left">Date</th>
                    <th class="px-4 py-3 text-left">Motif refus</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($demandes as $demande)
                <tr class="hover:bg-gray-50">
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
                    <td class="px-4 py-3">{{ $demande->motif_refus ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-4 py-6 text-center text-gray-500">Aucune demande</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-4 py-3">{{ $demandes->links() }}</div>
    </div>
@endsection