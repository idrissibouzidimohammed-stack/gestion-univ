@extends('layouts.professeur')

@section('title', 'Gestion des absences')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-bold text-gray-700">Liste des absences</h3>
        <a href="{{ route('professeur.absences.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Ajouter</a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">Étudiant</th>
                    <th class="px-4 py-3 text-left">Module</th>
                    <th class="px-4 py-3 text-left">Date</th>
                    <th class="px-4 py-3 text-left">Statut</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($absences as $absence)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $absence->etudiant->user->name }}</td>
                    <td class="px-4 py-3">{{ $absence->module->nom }}</td>
                    <td class="px-4 py-3">{{ \Carbon\Carbon::parse($absence->date)->format('d/m/Y') }}</td>
                    <td class="px-4 py-3">
                        @if($absence->justifiee)
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Justifiée</span>
                        @else
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs">Non justifiée</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-4 py-6 text-center text-gray-500">Aucune absence enregistrée</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-4 py-3">{{ $absences->links() }}</div>
    </div>
@endsection