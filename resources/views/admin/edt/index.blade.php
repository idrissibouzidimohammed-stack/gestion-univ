@extends('layouts.admin')

@section('title', 'Emploi du temps')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-bold text-gray-700">Emploi du temps global</h3>
        <a href="{{ route('admin.edt.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Ajouter séance</a>
    </div>

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
                    <th class="px-4 py-3 text-left">Actions</th>
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
                        @if($edt->type === 'cours')
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Cours</span>
                        @elseif($edt->type === 'td')
                            <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs">TD</span>
                        @else
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">TP</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 flex gap-2">
                        <a href="{{ route('admin.edt.edit', $edt) }}" class="bg-yellow-400 text-white px-3 py-1 rounded text-xs hover:bg-yellow-500">Modifier</a>
                        <form method="POST" action="{{ route('admin.edt.destroy', $edt) }}" onsubmit="return confirm('Supprimer ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-4 py-6 text-center text-gray-500">Aucune séance enregistrée</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-4 py-3">
            {{ $edts->links() }}
        </div>
    </div>
@endsection