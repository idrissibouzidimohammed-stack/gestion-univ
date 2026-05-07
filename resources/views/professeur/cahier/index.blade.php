@extends('layouts.professeur')

@section('title', 'Cahier de textes')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-bold text-gray-700">Mon cahier de textes</h3>
        <a href="{{ route('professeur.cahier.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Ajouter séance</a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">Date</th>
                    <th class="px-4 py-3 text-left">Module</th>
                    <th class="px-4 py-3 text-left">Horaire</th>
                    <th class="px-4 py-3 text-left">Objectif</th>
                    <th class="px-4 py-3 text-left">Type</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($cahiers as $cahier)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3">{{ \Carbon\Carbon::parse($cahier->date)->format('d/m/Y') }}</td>
                    <td class="px-4 py-3">{{ $cahier->module->nom }}</td>
                    <td class="px-4 py-3">{{ substr($cahier->heure_debut, 0, 5) }} - {{ substr($cahier->heure_fin, 0, 5) }}</td>
                    <td class="px-4 py-3">{{ $cahier->objectif }}</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 rounded text-xs
                            {{ $cahier->type_seance === 'cours' ? 'bg-green-100 text-green-800' :
                               ($cahier->type_seance === 'td' ? 'bg-yellow-100 text-yellow-800' : 'bg-blue-100 text-blue-800') }}">
                            {{ strtoupper($cahier->type_seance) }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-6 text-center text-gray-500">Aucune séance enregistrée</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-4 py-3">{{ $cahiers->links() }}</div>
    </div>
@endsection