<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Etudiant;
use App\Models\Professeur;
use App\Models\Groupe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('role')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $groupes = Groupe::all();
        return view('admin.users.create', compact('groupes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:etudiant,professeur,admin',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        if ($request->role === 'etudiant') {
            Etudiant::create([
                'user_id' => $user->id,
                'groupe_id' => $request->groupe_id,
                'cin' => $request->cin,
                'apogee' => $request->apogee,
                'telephone' => $request->telephone,
                'date_naissance' => $request->date_naissance,
            ]);
        }

        if ($request->role === 'professeur') {
            Professeur::create([
                'user_id' => $user->id,
                'cin' => $request->cin,
                'specialite' => $request->specialite,
                'telephone' => $request->telephone,
            ]);
        }

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur créé avec succès.');
    }

    public function edit(User $user)
    {
        $groupes = Groupe::all();
        return view('admin.users.edit', compact('user', 'groupes'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'role' => 'required|in:etudiant,professeur,admin',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        if ($request->password) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur modifié avec succès.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}