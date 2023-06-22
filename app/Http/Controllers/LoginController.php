<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function login_post(Request $request)
    {
        $auth = $request->validate([
            'email' =>'required',
            'password' => 'required',
        ]);
        
        if (Auth::attempt($auth)) {
            $request->session()->regenerate();
 
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('login');
        }

    }
}
