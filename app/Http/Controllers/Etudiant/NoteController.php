<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index()
    {
        $etudiant = Auth::user()->etudiant;
        $notes = Note::with('module')
            ->where('etudiant_id', $etudiant->id)
            ->get();
        return view('etudiant.notes.index', compact('notes'));
    }
}