<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

// user session
class AuthController extends Controller
{
    public function create() {
        // create user
        return inertia('Auth/Login');
    }

    public function store(Request $request) {
        // save user
        if (!Auth::attempt($request->validate([
            'email' => 'required|string|email',
            'password' =>'required|string'
        ]), true)){
            throw ValidationException::withMessages([
                'email' => 'Authentication Failed'
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended('/listing');

    }

    public function destroy(){
        // logout
    }
}
