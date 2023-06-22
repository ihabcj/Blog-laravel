<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function form_register()
    {
        return view('register');
    }

    public function form_register_post(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'nom' => 'required',
            'prenom' => 'required',
            'password' => 'required',
        ]);
        $user = new User();
        $user->email = $request->email;
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('register')->with('status', 'Votre inscription a bien ete prise');
    }
}
