<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function index()
    {
        
        $users = User::all();
        return view('superadmin.utilisateurs.index', compact('users'));
    }

    public function create()
    {
        $profiles=Profile::all();
        return view('superadmin.utilisateurs.create', compact('profiles'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        User::create($input);
        return redirect('/utilisateurs')->with('flash-message', 'Votre l\'utilisater  été bien enregistré');
    }
    
}
