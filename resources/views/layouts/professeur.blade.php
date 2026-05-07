<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Professeur - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">

        <!-- Sidebar -->
        <aside style="width:256px; background-color:#14532d; color:white; display:flex; flex-direction:column; min-height:100vh;">
    <div style="padding:20px 24px; border-bottom:1px solid #166534;">
        <h1 style="font-size:18px; font-weight:bold; color:white;">🎓 UPF Professeur</h1>
        <p style="font-size:12px; color:#86efac; margin-top:4px;">{{ auth()->user()->name }}</p>
    </div>
    <nav style="flex:1; padding:16px; display:flex; flex-direction:column; gap:4px;">
        <a href="{{ route('professeur.dashboard') }}" style="display:flex; align-items:center; gap:12px; padding:8px 12px; border-radius:8px; color:white; text-decoration:none; background:{{ request()->routeIs('professeur.dashboard') ? '#166534' : 'transparent' }};" onmouseover="this.style.background='#166534'" onmouseout="this.style.background='{{ request()->routeIs('professeur.dashboard') ? '#166534' : 'transparent' }}'">
            <span>🏠</span> Tableau de bord
        </a>
        <a href="{{ route('professeur.notes.index') }}" style="display:flex; align-items:center; gap:12px; padding:8px 12px; border-radius:8px; color:white; text-decoration:none; background:{{ request()->routeIs('professeur.notes.*') ? '#166534' : 'transparent' }};" onmouseover="this.style.background='#166534'" onmouseout="this.style.background='{{ request()->routeIs('professeur.notes.*') ? '#166534' : 'transparent' }}'">
            <span>📝</span> Saisie des notes
        </a>
        <a href="{{ route('professeur.absences.index') }}" style="display:flex; align-items:center; gap:12px; padding:8px 12px; border-radius:8px; color:white; text-decoration:none; background:{{ request()->routeIs('professeur.absences.*') ? '#166534' : 'transparent' }};" onmouseover="this.style.background='#166534'" onmouseout="this.style.background='{{ request()->routeIs('professeur.absences.*') ? '#166534' : 'transparent' }}'">
            <span>📅</span> Absences
        </a>
        <a href="{{ route('professeur.cahier.index') }}" style="display:flex; align-items:center; gap:12px; padding:8px 12px; border-radius:8px; color:white; text-decoration:none; background:{{ request()->routeIs('professeur.cahier.*') ? '#166534' : 'transparent' }};" onmouseover="this.style.background='#166534'" onmouseout="this.style.background='{{ request()->routeIs('professeur.cahier.*') ? '#166534' : 'transparent' }}'">
            <span>📖</span> Cahier de textes
        </a>
        <a href="{{ route('professeur.edt.index') }}" style="display:flex; align-items:center; gap:12px; padding:8px 12px; border-radius:8px; color:white; text-decoration:none; background:{{ request()->routeIs('professeur.edt.*') ? '#166534' : 'transparent' }};" onmouseover="this.style.background='#166534'" onmouseout="this.style.background='{{ request()->routeIs('professeur.edt.*') ? '#166534' : 'transparent' }}'">
            <span>🗓️</span> Emploi du temps
        </a>
        <a href="{{ route('professeur.reservations.index') }}" style="display:flex; align-items:center; gap:12px; padding:8px 12px; border-radius:8px; color:white; text-decoration:none; background:{{ request()->routeIs('professeur.reservations.*') ? '#166534' : 'transparent' }};" onmouseover="this.style.background='#166534'" onmouseout="this.style.background='{{ request()->routeIs('professeur.reservations.*') ? '#166534' : 'transparent' }}'">
            <span>🔑</span> Réservations
        </a>
        <a href="{{ route('professeur.demandes.index') }}" style="display:flex; align-items:center; gap:12px; padding:8px 12px; border-radius:8px; color:white; text-decoration:none; background:{{ request()->routeIs('professeur.demandes.*') ? '#166534' : 'transparent' }};" onmouseover="this.style.background='#166534'" onmouseout="this.style.background='{{ request()->routeIs('professeur.demandes.*') ? '#166534' : 'transparent' }}'">
            <span>📄</span> Demandes
        </a>
    </nav>
    <div style="padding:16px; border-top:1px solid #166534;">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" style="width:100%; text-align:left; display:flex; align-items:center; gap:12px; padding:8px 12px; border-radius:8px; color:#fca5a5; background:transparent; border:none; cursor:pointer;" onmouseover="this.style.background='#166534'" onmouseout="this.style.background='transparent'">
                <span>🚪</span> Déconnexion
            </button>
        </form>
    </div>
</aside>

        <!-- Main content -->
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