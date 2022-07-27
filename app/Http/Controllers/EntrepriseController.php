<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    public function index()
    {
        
        $entreprises = Entreprise::all();
        return view('superadmin.entreprises.index', compact('entreprises'));
    }

    public function create()
    {
        return view('superadmin.entreprises.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Entreprise::create($input);
        return redirect('/entreprises')->with('flash-message', 'Votre entrprise à été bien enregistré');
    }

    
}
