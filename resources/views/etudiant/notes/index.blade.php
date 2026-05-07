@extends('layouts.etudiant')

@section('title', 'Mes notes')

@section('content')
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">Module</th>
                    <th class="px-4 py-3 text-left">CC1</th>
                    <th class="px-4 py-3 text-left">CC2</th>
                    <th class="px-4 py-3 text-left">Examen</th>
                    <th class="px-4 py-3 text-left">Note finale</th>
                    <th class="px-4 py-3 text-left">Résultat</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($notes as $note)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 font-medium">{{ $note->module->nom }}</td>
                    <td class="px-4 py-3">{{ $note->cc1 ?? '-' }}</td>
                    <td class="px-4 py-3">{{ $note->cc2 ?? '-' }}</td>
                    <td class="px-4 py-3">{{ $note->examen ?? '-' }}</td>
                    <td class="px-4 py-3 font-bold">{{ $note->note_finale ?? '-' }}/20</td>
                    <td class="px-4 py-3">
                        @if($note->note_finale !== null)
                            @if($note->note_finale >= 10)
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Validé ✓</span>
                            @else
                                <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs">Non validé ✗</span>
                            @endif
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">Aucune note disponible</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection