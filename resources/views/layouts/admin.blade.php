<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPF Portal | Administration</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F8FAFC] text-slate-900 antialiased min-h-screen">

    <!-- Primary Top Header -->
    <header class="bg-[#0F172A] text-white py-4 px-6 md:px-12 relative overflow-hidden">
        <!-- Abstract Background Glow -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-indigo-500/10 rounded-full blur-[100px] -translate-y-1/2 translate-x-1/4"></div>
        
        <div class="max-w-7xl mx-auto flex justify-between items-center relative z-10">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center backdrop-blur-md ring-1 ring-white/20">
                    <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-lg font-extrabold tracking-tight">UPF <span class="text-indigo-400">Portal</span></h1>
                    <p class="text-[9px] uppercase tracking-[0.3em] text-slate-500 font-bold">Admin Console</p>
                </div>
            </div>

            <div class="flex items-center gap-6">
                <div class="hidden sm:flex items-center gap-3 px-4 py-2 bg-white/5 rounded-2xl border border-white/10 backdrop-blur-sm">
                    <div class="w-8 h-8 rounded-full bg-indigo-500 flex items-center justify-center text-xs font-bold">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <span class="text-xs font-bold">{{ auth()->user()->name }}</span>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="p-2.5 rounded-xl bg-white/5 hover:bg-rose-500/20 text-slate-400 hover:text-rose-400 transition-all border border-white/5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Secondary Nav Bar -->
    <nav class="glass-header h-16 px-6 md:px-12 flex items-center shadow-sm">
        <div class="max-w-7xl mx-auto w-full flex items-center gap-2 overflow-x-auto no-scrollbar">
            <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'nav-item-active' : 'nav-item-inactive' }}">
                Dashboard
            </a>
            <div class="w-px h-4 bg-slate-200 mx-2"></div>
            <a href="{{ route('admin.users.index') }}" class="nav-item {{ request()->routeIs('admin.users.*') ? 'nav-item-active' : 'nav-item-inactive' }}">
                Utilisateurs
            </a>
            <a href="{{ route('admin.groupes.index') }}" class="nav-item {{ request()->routeIs('admin.groupes.*') ? 'nav-item-active' : 'nav-item-inactive' }}">
                Groupes
            </a>
            <a href="{{ route('admin.modules.index') }}" class="nav-item {{ request()->routeIs('admin.modules.*') ? 'nav-item-active' : 'nav-item-inactive' }}">
                Modules
            </a>
            <a href="{{ route('admin.notes.index') }}" class="nav-item {{ request()->routeIs('admin.notes.*') ? 'nav-item-active' : 'nav-item-inactive' }}">
                Notes
            </a>
            <a href="{{ route('admin.absences.index') }}" class="nav-item {{ request()->routeIs('admin.absences.*') ? 'nav-item-active' : 'nav-item-inactive' }}">
                Absences
            </a>
            <a href="{{ route('admin.salles.index') }}" class="nav-item {{ request()->routeIs('admin.salles.*') ? 'nav-item-active' : 'nav-item-inactive' }}">
                Salles
            </a>
            <a href="{{ route('admin.edt.index') }}" class="nav-item {{ request()->routeIs('admin.edt.*') ? 'nav-item-active' : 'nav-item-inactive' }}">
                Planning
            </a>
            <a href="{{ route('admin.demandes.index') }}" class="nav-item {{ request()->routeIs('admin.demandes.*') ? 'nav-item-active' : 'nav-item-inactive' }}">
                Demandes
            </a>
        </div>
    </nav>

    <!-- Content Area -->
    <main class="max-w-7xl mx-auto py-12 px-6 md:px-12">
        <!-- Section Header -->
        <div class="mb-10 animate-slide-up">
            <h2 class="text-4xl font-extrabold text-slate-900 tracking-tight">@yield('title', 'Dashboard')</h2>
            <div class="flex items-center gap-3 mt-2">
                <span class="w-8 h-1 bg-indigo-500 rounded-full"></span>
                <p class="text-slate-500 font-medium text-sm">{{ now()->translatedFormat('l d F Y') }}</p>
            </div>
        </div>

        <!-- Feedback Messages -->
        @if(session('success'))
            <div class="mb-8 p-5 bg-emerald-50 border border-emerald-100 rounded-[1.5rem] flex items-center gap-4 text-emerald-800 shadow-sm animate-slide-up">
                <div class="w-10 h-10 bg-emerald-500 rounded-xl flex items-center justify-center text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                </div>
                <p class="font-bold">{{ session('success') }}</p>
            </div>
        @endif

        <div class="animate-slide-up" style="animation-delay: 0.1s">
            @yield('content')
        </div>
    </main>

    <footer class="py-12 border-t border-slate-200 mt-20 bg-white">
        <div class="max-w-7xl mx-auto px-6 md:px-12 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-3 opacity-50">
                <div class="w-6 h-6 bg-slate-900 rounded-lg"></div>
                <span class="font-bold text-sm tracking-widest uppercase">UPF Console</span>
            </div>
            <p class="text-slate-400 text-xs font-medium uppercase tracking-[0.2em]">© {{ date('Y') }} Université Privée de Fès — All Rights Reserved</p>
        </div>
    </footer>

</body>
</html>
 </main>

    </div>
</body>
</html>