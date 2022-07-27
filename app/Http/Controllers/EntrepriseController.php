<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Profile;
use App\Models\User;
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
        $entreprise = Entreprise::create([
            'name' => $request->name,
            'adresse' => $request->adresse,
            'secteur' => $request->secteur,
            'telephone' => $request->telephone,
        ]);

        User::create([
            'email'=>$request->email,
            'password'=>$request->password,
            'entreprise_id'=>$entreprise->id,
            'profile_id'=> Profile::where('name', 'admin')->get()->first()->id
        ]);
        
        return redirect('/entreprises')->with('flash-message', 'Votre entrprise à été bien enregistré');
    }
    public function show()
    {
        
    }

    public function edit($id)
    {

        $entreprise = Entreprise::find($id);
        return view('superadmin.entreprises.edit')->with('entreprise', $entreprise);
    }

    public function update(Request $request, $id)
    {
        $entreprise = Entreprise::find($id);
        $input = $request->all();
        $entreprise->update($input);
        return redirect('superadmin/entreprises')->with('flash-message', 'Vos modifications ont été bien enregistré');
    }

    public function destroy(Entreprise $entreprise)
    {
        $entreprise->delete();
        return back()->with('flash-message', 'compte supprimé avec succés');
    }
    
}
