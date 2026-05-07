@extends('layouts.admin')

@section('title', 'Vue d\'ensemble')

@section('content')
    <!-- Dashboard Hero -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
        <div class="lg:col-span-2 prestige-card p-10 bg-[#0F172A] text-white relative">
            <div class="absolute top-0 right-0 w-64 h-64 bg-indigo-500/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/4"></div>
            <div class="relative z-10">
                <h3 class="text-3xl font-extrabold tracking-tight mb-2">Bienvenue sur votre console</h3>
                <p class="text-slate-400 font-medium max-w-md">Gérez l'ensemble de l'écosystème universitaire de l'UPF depuis cet espace centralisé et sécurisé.</p>
                
                <div class="flex gap-4 mt-8">
                    <a href="{{ route('admin.users.index') }}" class="btn-action bg-white text-slate-900">
                        Gérer les accès
                    </a>
                    <a href="{{ route('admin.demandes.index') }}" class="btn-action bg-white/10 text-white backdrop-blur-md border border-white/10">
                        Voir les demandes
                    </a>
                </div>
            </div>
        </div>

        <div class="prestige-card p-10 flex flex-col justify-between border-slate-200">
            <div>
                <p class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-1">État du Système</p>
                <div class="flex items-center gap-2 mb-6">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span class="text-xs font-bold text-slate-900">Opérationnel</span>
                </div>
            </div>
            <div class="space-y-4">
                <div class="flex justify-between items-end">
                    <span class="text-xs font-bold text-slate-500">Modules Actifs</span>
                    <span class="text-2xl font-black text-slate-900">{{ $totalModules }}</span>
                </div>
                <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                    <div class="w-3/4 h-full bg-slate-900"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Metrics Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
        <div class="prestige-card p-8 group">
            <div class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-900 border border-slate-100 group-hover:bg-slate-900 group-hover:text-white transition-all duration-300 mb-6">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
            </div>
            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Étudiants</p>
            <h4 class="text-3xl font-extrabold text-slate-900">{{ $totalEtudiants }}</h4>
            <div class="mt-4 flex items-center gap-2 text-emerald-600 font-bold text-[10px]">
                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5V10a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 11.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L10 10.586 13.586 7H12z" clip-rule="evenodd"></path></svg>
                +4.2% ce mois
            </div>
        </div>

        <div class="prestige-card p-8 group">
            <div class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-900 border border-slate-100 group-hover:bg-slate-900 group-hover:text-white transition-all duration-300 mb-6">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
            </div>
            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Enseignants</p>
            <h4 class="text-3xl font-extrabold text-slate-900">{{ $totalProfesseurs }}</h4>
            <p class="mt-4 text-slate-400 font-bold text-[10px]">Stable (98% présence)</p>
        </div>

        <div class="prestige-card p-8 group">
            <div class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-900 border border-slate-100 group-hover:bg-slate-900 group-hover:text-white transition-all duration-300 mb-6">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
            </div>
            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Demandes</p>
            <h4 class="text-3xl font-extrabold text-slate-900">{{ $totalDemandes }}</h4>
            <div class="mt-4 flex items-center gap-2 text-rose-500 font-bold text-[10px]">
                <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                Action requise
            </div>
        </div>
    </div>

    <!-- Quick Navigation Tiles -->
    <h5 class="text-xs font-black text-slate-400 uppercase tracking-[0.3em] mb-6 px-2">Navigation Rapide</h5>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="{{ route('admin.notes.index') }}" class="prestige-card p-6 flex flex-col items-center text-center hover:bg-slate-50 transition-colors">
            <div class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center mb-3">
                <svg class="w-5 h-5 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
            <span class="text-xs font-bold text-slate-900">Notes</span>
        </a>
        <a href="{{ route('admin.edt.index') }}" class="prestige-card p-6 flex flex-col items-center text-center hover:bg-slate-50 transition-colors">
            <div class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center mb-3">
                <svg class="w-5 h-5 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z" /></svg>
            </div>
            <span class="text-xs font-bold text-slate-900">Planning</span>
        </a>
        <a href="{{ route('admin.salles.index') }}" class="prestige-card p-6 flex flex-col items-center text-center hover:bg-slate-50 transition-colors">
            <div class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center mb-3">
                <svg class="w-5 h-5 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m4 0h1m-5 10h1m4 0h1m-5-4h1m4 0h1" /></svg>
            </div>
            <span class="text-xs font-bold text-slate-900">Salles</span>
        </a>
        <a href="{{ route('admin.groupes.index') }}" class="prestige-card p-6 flex flex-col items-center text-center hover:bg-slate-50 transition-colors">
            <div class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center mb-3">
                <svg class="w-5 h-5 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
            </div>
            <span class="text-xs font-bold text-slate-900">Groupes</span>
        </a>
    </div>
@endsection
