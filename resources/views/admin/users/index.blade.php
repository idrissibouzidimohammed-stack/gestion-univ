@extends('layouts.admin')

@section('title', 'Gestion des utilisateurs')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-bold text-gray-700">Liste des utilisateurs</h3>
        <a href="{{ route('admin.users.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Ajouter</a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">Nom</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">Rôle</th>
                    <th class="px-4 py-3 text-left">Créé le</th>
                    <th class="px-4 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($users as $user)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $user->name }}</td>
                    <td class="px-4 py-3">{{ $user->email }}</td>
                    <td class="px-4 py-3">
                        @if($user->role === 'admin')
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs">Admin</span>
                        @elseif($user->role === 'professeur')
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Professeur</span>
                        @else
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">Étudiant</span>
                        @endif
                    </td>
                    <td class="px-4 py-3">{{ $user->created_at->format('d/m/Y') }}</td>
                    <td class="px-4 py-3 flex gap-2">
                        <a href="{{ route('admin.users.edit', $user) }}" class="bg-yellow-400 text-white px-3 py-1 rounded text-xs hover:bg-yellow-500">Modifier</a>
                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Supprimer ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-4 py-3">
            {{ $users->links() }}
        </div>
    </div>
@endsection