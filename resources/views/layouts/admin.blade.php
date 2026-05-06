<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white flex flex-col">
            <div class="px-6 py-5 border-b border-gray-700">
                <h1 class="text-lg font-bold">🎓 UPF Admin</h1>
                <p class="text-xs text-gray-400 mt-1">{{ auth()->user()->name }}</p>
            </div>
            <nav class="flex-1 px-4 py-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-700 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700' : '' }}">
                    <span>🏠</span> Tableau de bord
                </a>
                <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-700 {{ request()->routeIs('admin.users.*') ? 'bg-gray-700' : '' }}">
                    <span>👥</span> Utilisateurs
                </a>
                <a href="{{ route('admin.groupes.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-700 {{ request()->routeIs('admin.groupes.*') ? 'bg-gray-700' : '' }}">
                    <span>📚</span> Groupes
                </a>
                <a href="{{ route('admin.modules.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-700 {{ request()->routeIs('admin.modules.*') ? 'bg-gray-700' : '' }}">
                    <span>📖</span> Modules
                </a>
                <a href="{{ route('admin.notes.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-700 {{ request()->routeIs('admin.notes.*') ? 'bg-gray-700' : '' }}">
                    <span>📝</span> Notes
                </a>
                <a href="{{ route('admin.absences.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-700 {{ request()->routeIs('admin.absences.*') ? 'bg-gray-700' : '' }}">
                    <span>📅</span> Absences
                </a>
                <a href="{{ route('admin.salles.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-700 {{ request()->routeIs('admin.salles.*') ? 'bg-gray-700' : '' }}">
                    <span>🏫</span> Salles
                </a>
                <a href="{{ route('admin.edt.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-700 {{ request()->routeIs('admin.edt.*') ? 'bg-gray-700' : '' }}">
                    <span>🗓️</span> Emploi du temps
                </a>
                <a href="{{ route('admin.demandes.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-700 {{ request()->routeIs('admin.demandes.*') ? 'bg-gray-700' : '' }}">
                    <span>📄</span> Demandes
                </a>
                <a href="{{ route('admin.reservations.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-700 {{ request()->routeIs('admin.reservations.*') ? 'bg-gray-700' : '' }}">
                    <span>🔑</span> Réservations
                </a>
            </nav>
            <div class="px-4 py-4 border-t border-gray-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-700 text-red-400">
                        <span>🚪</span> Déconnexion
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main content -->
        <main class="flex-1 overflow-y-auto">
            <!-- Top bar -->
            <div class="bg-white shadow px-6 py-4 flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-700">@yield('title')</h2>
                <span class="text-sm text-gray-500">{{ now()->format('d/m/Y') }}</span>
            </div>
            <!-- Page content -->
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