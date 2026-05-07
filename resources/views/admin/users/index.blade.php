@extends('layouts.admin')

@section('title', 'Gestion des utilisateurs')

@section('content')
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
        <div>
            <h3 class="text-2xl font-bold font-outfit text-slate-800">Utilisateurs</h3>
            <p class="text-sm text-slate-500">Gérez les comptes et les permissions du personnel et des étudiants.</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="btn-premium flex items-center gap-2">
            <span class="text-xl leading-none">+</span>
            <span>Ajouter un utilisateur</span>
        </a>
    </div>

    <div class="card-premium overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100">
                        <th class="px-6 py-4 font-bold text-slate-600 uppercase tracking-wider text-[10px]">Utilisateur</th>
                        <th class="px-6 py-4 font-bold text-slate-600 uppercase tracking-wider text-[10px]">Rôle</th>
                        <th class="px-6 py-4 font-bold text-slate-600 uppercase tracking-wider text-[10px]">Date d'ajout</th>
                        <th class="px-6 py-4 font-bold text-slate-600 uppercase tracking-wider text-[10px] text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($users as $user)
                    <tr class="hover:bg-indigo-50/30 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center font-bold text-slate-500 border border-slate-200 group-hover:from-indigo-500 group-hover:to-purple-600 group-hover:text-white group-hover:border-transparent transition-all duration-300">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="font-bold text-slate-800">{{ $user->name }}</p>
                                    <p class="text-xs text-slate-500">{{ $user->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @if($user->role === 'admin')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-bold uppercase bg-rose-50 text-rose-600 border border-rose-100">
                                    <span class="w-1 h-1 rounded-full bg-rose-600"></span> Admin
                                </span>
                            @elseif($user->role === 'professeur')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-bold uppercase bg-emerald-50 text-emerald-600 border border-emerald-100">
                                    <span class="w-1 h-1 rounded-full bg-emerald-600"></span> Professeur
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-bold uppercase bg-blue-50 text-blue-600 border border-blue-100">
                                    <span class="w-1 h-1 rounded-full bg-blue-600"></span> Étudiant
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-slate-500 font-medium">
                            {{ $user->created_at->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <a href="{{ route('admin.users.edit', $user) }}" class="p-2 bg-slate-50 text-slate-600 rounded-lg hover:bg-indigo-600 hover:text-white border border-slate-200 transition-all" title="Modifier">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                                </a>
                                <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 bg-slate-50 text-slate-600 rounded-lg hover:bg-rose-600 hover:text-white border border-slate-200 transition-all" title="Supprimer">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($users->hasPages())
        <div class="px-6 py-4 bg-slate-50/50 border-t border-slate-100">
            {{ $users->links() }}
        </div>
        @endif
    </div>
@endsection