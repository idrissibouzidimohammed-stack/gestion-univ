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
        <aside class="w-64 bg-green-900 text-white flex flex-col">
            <div class="px-6 py-5 border-b border-green-700">
                <h1 class="text-lg font-bold">🎓 UPF Professeur</h1>
                <p class="text-xs text-green-300 mt-1">{{ auth()->user()->name }}</p>
            </div>
            <nav class="flex-1 px-4 py-4 space-y-1">
                <a href="{{ route('professeur.dashboard') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-green-700 {{ request()->routeIs('professeur.dashboard') ? 'bg-green-700' : '' }}">
                    <span>🏠</span> Tableau de bord
                </a>
                <a href="{{ route('professeur.notes.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-green-700 {{ request()->routeIs('professeur.notes.*') ? 'bg-green-700' : '' }}">
                    <span>📝</span> Saisie des notes
                </a>
                <a href="{{ route('professeur.absences.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-green-700 {{ request()->routeIs('professeur.absences.*') ? 'bg-green-700' : '' }}">
                    <span>📅</span> Absences
                </a>
                <a href="{{ route('professeur.cahier.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-green-700 {{ request()->routeIs('professeur.cahier.*') ? 'bg-green-700' : '' }}">
                    <span>📖</span> Cahier de textes
                </a>
                <a href="{{ route('professeur.edt.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-green-700 {{ request()->routeIs('professeur.edt.*') ? 'bg-green-700' : '' }}">
                    <span>🗓️</span> Emploi du temps
                </a>
                <a href="{{ route('professeur.reservations.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-green-700 {{ request()->routeIs('professeur.reservations.*') ? 'bg-green-700' : '' }}">
                    <span>🔑</span> Réservations
                </a>
                <a href="{{ route('professeur.demandes.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-green-700 {{ request()->routeIs('professeur.demandes.*') ? 'bg-green-700' : '' }}">
                    <span>📄</span> Demandes
                </a>
            </nav>
            <div class="px-4 py-4 border-t border-green-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-green-700 text-red-400">
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