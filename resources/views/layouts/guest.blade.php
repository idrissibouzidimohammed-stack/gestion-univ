<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Outfit:wght@600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body { font-family: 'Plus Jakarta Sans', sans-serif; }
            .font-outfit { font-family: 'Outfit', sans-serif; }
        </style>
    </head>
    <body class="antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#0F172A] relative overflow-hidden">
            <!-- Background Decorations -->
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
                <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-indigo-600/20 rounded-full blur-[120px]"></div>
                <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-purple-600/20 rounded-full blur-[120px]"></div>
            </div>

            <div class="relative z-10 w-full sm:max-w-md">
                <div class="flex flex-col items-center mb-10">
                    <div class="w-16 h-16 bg-indigo-600 rounded-3xl flex items-center justify-center shadow-2xl mb-6 ring-1 ring-white/20">
                        <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        </svg>
                    </div>
                    <h1 class="text-4xl font-extrabold text-white font-outfit tracking-tighter">UPF <span class="text-indigo-400">PORTAL</span></h1>
                    <p class="text-slate-500 text-xs font-bold uppercase tracking-[0.3em] mt-3">University Management</p>
                </div>

                <div class="glass-dark p-10 rounded-[2.5rem] shadow-2xl border border-white/5 animate-fade-in relative">
                    {{ $slot }}
                </div>

                <div class="mt-8 text-center">
                    <p class="text-slate-500 text-xs font-medium uppercase tracking-widest">© {{ date('Y') }} Université Privée de Fès</p>
                </div>
            </div>
        </div>
    </body>
</html>
