<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        return view('profiles.index', compact('profiles'));
    }
    public function create()
    {
        return view('profiles.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Profile::create($input);
        return redirect('/profiles')->with('flash-message', 'Votre le profiles  été bien enregistré');
    }
}
