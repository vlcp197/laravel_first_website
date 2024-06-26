<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            'username' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:users'],
            'password' => ['required','min:3', 'confirmed']
        ]);

        $user = User::create($fields);
        
        Auth::login($user);

        return redirect()->route('home');
    }

    // Login user
    public function login(Request $request){
        // Validate
        $fields = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required']
        ]);

        // Try to login the user
        if(Auth::attempt($fields, $request->remember)){
            return redirect()->intended();
        } else {
            return back()->withErrors([
                'failed' => 'The provided credentials do not match our records.'
            ]);
        }
    }
}
