<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UtilisateurController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('superadmin.utilisateurs.index', compact('users'));
    }



    public function login(Request $request)
    {
        $tab = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::attempt($tab,$request->all())){
            session()->regenerate();
            $user = Auth::user();
            if($user->profile->name=='super admin'){
                return redirect('/entreprises');
            }else if($user->profile->name=='admin'){
                return redirect('/utilisateurs');
            }
            dd('user simple');
        }
    }

    public function create()
    {
        $profiles=Profile::all();
        return view('superadmin.utilisateurs.create', compact('profiles'));
    }

    public function store(Request $request)
    {


        User::create([
            'email'=>$request->email,
            'password'=>$request->password,
            'entreprise_id'=>Auth::user() ? Auth::user()->entreprise_id : 1,
            'profile_id'=> Profile::where('name', 'user')->get()->first()->id
        ]);
        return redirect('/utilisateurs')->with('flash-message', 'Votre l\'utilisater  été bien enregistré');
    }
    
}
