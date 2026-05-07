<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Étudiant - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">

        <aside style="width:256px; background-color:#1e3a8a; color:white; display:flex; flex-direction:column; min-height:100vh;">
            <div style="padding:20px 24px; border-bottom:1px solid #1e40af;">
                <h1 style="font-size:18px; font-weight:bold; color:white;">🎓 UPF Étudiant</h1>
                <p style="font-size:12px; color:#93c5fd; margin-top:4px;">{{ auth()->user()->name }}</p>
            </div>
            <nav style="flex:1; padding:16px; display:flex; flex-direction:column; gap:4px;">
                <a href="{{ route('etudiant.dashboard') }}" style="display:flex; align-items:center; gap:12px; padding:8px 12px; border-radius:8px; color:white; text-decoration:none; background:{{ request()->routeIs('etudiant.dashboard') ? '#1e40af' : 'transparent' }};" onmouseover="this.style.background='#1e40af'" onmouseout="this.style.background='{{ request()->routeIs('etudiant.dashboard') ? '#1e40af' : 'transparent' }}'">
                    <span>🏠</span> Tableau de bord
                </a>
                <a href="{{ route('etudiant.notes.index') }}" style="display:flex; align-items:center; gap:12px; padding:8px 12px; border-radius:8px; color:white; text-decoration:none; background:{{ request()->routeIs('etudiant.notes.*') ? '#1e40af' : 'transparent' }};" onmouseover="this.style.background='#1e40af'" onmouseout="this.style.background='{{ request()->routeIs('etudiant.notes.*') ? '#1e40af' : 'transparent' }}'">
                    <span>📝</span> Mes notes
                </a>
                <a href="{{ route('etudiant.absences.index') }}" style="display:flex; align-items:center; gap:12px; padding:8px 12px; border-radius:8px; color:white; text-decoration:none; background:{{ request()->routeIs('etudiant.absences.*') ? '#1e40af' : 'transparent' }};" onmouseover="this.style.background='#1e40af'" onmouseout="this.style.background='{{ request()->routeIs('etudiant.absences.*') ? '#1e40af' : 'transparent' }}'">
                    <span>📅</span> Mes absences
                </a>
                <a href="{{ route('etudiant.edt.index') }}" style="display:flex; align-items:center; gap:12px; padding:8px 12px; border-radius:8px; color:white; text-decoration:none; background:{{ request()->routeIs('etudiant.edt.*') ? '#1e40af' : 'transparent' }};" onmouseover="this.style.background='#1e40af'" onmouseout="this.style.background='{{ request()->routeIs('etudiant.edt.*') ? '#1e40af' : 'transparent' }}'">
                    <span>🗓️</span> Emploi du temps
                </a>
                <a href="{{ route('etudiant.demandes.index') }}" style="display:flex; align-items:center; gap:12px; padding:8px 12px; border-radius:8px; color:white; text-decoration:none; background:{{ request()->routeIs('etudiant.demandes.*') ? '#1e40af' : 'transparent' }};" onmouseover="this.style.background='#1e40af'" onmouseout="this.style.background='{{ request()->routeIs('etudiant.demandes.*') ? '#1e40af' : 'transparent' }}'">
                    <span>📄</span> Demandes
                </a>
            </nav>
            <div style="padding:16px; border-top:1px solid #1e40af;">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" style="width:100%; text-align:left; display:flex; align-items:center; gap:12px; padding:8px 12px; border-radius:8px; color:#fca5a5; background:transparent; border:none; cursor:pointer;" onmouseover="this.style.background='#1e40af'" onmouseout="this.style.background='transparent'">
                        <span>🚪</span> Déconnexion
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto">
            <div class="bg-white shadow px-6 py-4 flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-700">@yield('title')</h2>
                <span class="text-sm text-gray-500">{{ now()->format('d/m/Y') }}</span>
            </div>
            <div class="p-6">
                @if(session('success'))
                    <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="bg-red-100 text-red-800 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif
                @yield('content')
            </div>
        </main>

    </div>
</body>
</html>