@extends('layouts.admin')

@section('title', 'Modifier une note')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-lg">
        <form method="POST" action="{{ route('admin.notes.update', $note) }}">
            @csrf
            @method('PUT')

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Étudiant</label>
                    <input type="text" value="{{ $note->etudiant->user->name }}" class="w-full border rounded px-3 py-2 bg-gray-100" disabled>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Module</label>
                    <input type="text" value="{{ $note->module->nom }}" class="w-full border rounded px-3 py-2 bg-gray-100" disabled>
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">CC1 /20</label>
                        <input type="number" name="cc1" value="{{ old('cc1', $note->cc1) }}" min="0" max="20" step="0.25" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">CC2 /20</label>
                        <input type="number" name="cc2" value="{{ old('cc2', $note->cc2) }}" min="0" max="20" step="0.25" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Examen /20</label>
                        <input type="number" name="examen" value="{{ old('examen', $note->examen) }}" min="0" max="20" step="0.25" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <div class="bg-gray-50 rounded p-3 text-sm text-gray-600">
                    📌 Note finale = ((CC1 + CC2) / 2) × 0.4 + Examen × 0.6
                </div>

                <div class="bg-blue-50 rounded p-3 text-sm text-blue-800">
                    Note finale actuelle : <strong>{{ $note->note_finale }}/20</strong>
                </div>
            </div>

            <div class="mt-6 flex gap-3">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Modifier</button>
                <a href="{{ route('admin.notes.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">Annuler</a>
            </div>
        </form>
    </div>
@endsection