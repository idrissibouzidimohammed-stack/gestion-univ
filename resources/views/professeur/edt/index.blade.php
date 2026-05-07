@extends('layouts.professeur')

@section('title', 'Mon emploi du temps')

@section('content')
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">Jour</th>
                    <th class="px-4 py-3 text-left">Horaire</th>
                    <th class="px-4 py-3 text-left">Module</th>
                    <th class="px-4 py-3 text-left">Groupe</th>
                    <th class="px-4 py-3 text-left">Salle</th>
                    <th class="px-4 py-3 text-left">Type</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($edts as $edt)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 font-medium capitalize">{{ $edt->jour }}</td>
                    <td class="px-4 py-3">{{ substr($edt->heure_debut, 0, 5) }} - {{ substr($edt->heure_fin, 0, 5) }}</td>
                    <td class="px-4 py-3">{{ $edt->module->nom }}</td>
                    <td class="px-4 py-3">{{ $edt->groupe->nom }}</td>
                    <td class="px-4 py-3">{{ $edt->salle->nom }}</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 rounded text-xs
                            {{ $edt->type === 'cours' ? 'bg-green-100 text-green-800' :
                               ($edt->type === 'td' ? 'bg-yellow-100 text-yellow-800' : 'bg-blue-100 text-blue-800') }}">
                            {{ strtoupper($edt->type) }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">Aucune séance</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection