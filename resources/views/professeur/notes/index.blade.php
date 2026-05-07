@extends('layouts.professeur')

@section('title', 'Saisie des notes')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-bold text-gray-700">Mes notes</h3>
        <a href="{{ route('professeur.notes.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Ajouter</a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">Étudiant</th>
                    <th class="px-4 py-3 text-left">Module</th>
                    <th class="px-4 py-3 text-left">CC1</th>
                    <th class="px-4 py-3 text-left">CC2</th>
                    <th class="px-4 py-3 text-left">Examen</th>
                    <th class="px-4 py-3 text-left">Note finale</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($notes as $note)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $note->etudiant->user->name }}</td>
                    <td class="px-4 py-3">{{ $note->module->nom }}</td>
                    <td class="px-4 py-3">{{ $note->cc1 ?? '-' }}</td>
                    <td class="px-4 py-3">{{ $note->cc2 ?? '-' }}</td>
                    <td class="px-4 py-3">{{ $note->examen ?? '-' }}</td>
                    <td class="px-4 py-3">
                        @if($note->note_finale !== null)
                            <span class="px-2 py-1 rounded text-xs font-bold {{ $note->note_finale >= 10 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $note->note_finale }}/20
                            </span>
                        @else
                            -
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">Aucune note enregistrée</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-4 py-3">{{ $notes->links() }}</div>
    </div>
@endsection