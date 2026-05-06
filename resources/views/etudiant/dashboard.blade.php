<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Étudiant</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="min-h-screen">
        <nav class="bg-blue-600 text-white px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold">Espace Étudiant</h1>
            <div class="flex items-center gap-4">
                <span>{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-white text-blue-600 px-4 py-1 rounded">Déconnexion</button>
                </form>
            </div>
        </nav>
        <div class="p-6">
            <h2 class="text-2xl font-bold mb-4">Bienvenue, {{ auth()->user()->name }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white rounded-lg shadow p-4">
                    <h3 class="font-bold text-lg text-blue-600">Mes Notes</h3>
                    <p class="text-gray-500 mt-2">Consulter vos notes</p>
                </div>
                <div class="bg-white rounded-lg shadow p-4">
                    <h3 class="font-bold text-lg text-blue-600">Emploi du temps</h3>
                    <p class="te