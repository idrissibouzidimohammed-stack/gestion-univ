@extends('layouts.etudiant')

@section('title', 'Mes absences')

@section('content')
    <div class="grid grid-cols-3 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-4 border-l-4 border-gray-500">
            <p class="text-sm text-gray-500">Total</p>
            <p class="text-2xl font-bold text-gray-600">{{ $total }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 border-l-4 border-green-500">
            <p class="text-sm text-gray-500">Justifiées</p>
            <p class="text-2xl font-bold text-green-600">{{ $justifiees }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 border-l-4 border-red-500">
            <p class="text-sm text-gray-500">Non justifiées</p>
            <p class="text-2xl font-bold text-red-600">{{ $nonJustifiees }}</p>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">Module</th>
                    <th class="px-4 py-3 text-left">Date</th>
                    <th class="px-4 py-3 text-left">Statut</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($absences as $absence)
                <tr class="hover:bg-gray-50">
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
                    <td colspan="3" class="px-4 py-6 text-center text-gray-500">Aucune absence</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection