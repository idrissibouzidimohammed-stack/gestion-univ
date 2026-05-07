@extends('layouts.professeur')

@section('title', 'Mes réservations')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-bold text-gray-700">Mes réservations de salles</h3>
        <a href="{{ route('professeur.reservations.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Réserver</a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">Salle</th>
                    <th class="px-4 py-3 text-left">Date</th>
                    <th class="px-4 py-3 text-left">Horaire</th>
                    <th class="px-4 py-3 text-left">Motif</th>
                    <th class="px-4 py-3 text-left">Statut</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($reservations as $reservation)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $reservation->salle->nom }}</td>
                    <td class="px-4 py-3">{{ \Carbon\Carbon::parse($reservation->date)->format('d/m/Y') }}</td>
                    <td class="px-4 py-3">{{ substr($reservation->heure_debut, 0, 5) }} - {{ substr($reservation->heure_fin, 0, 5) }}</td>
                    <td class="px-4 py-3">{{ $reservation->motif ?? '-' }}</td>
                    <td class="px-4 py-3">
                        @if($reservation->statut === 'en_attente')
                            <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs">En attente</span>
                        @elseif($reservation->statut === 'validee')
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Validée</span>
                        @else
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs">Refusée</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-6 text-center text-gray-500">Aucune réservation</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-4 py-3">{{ $reservations->links() }}</div>
    </div>
@endsection