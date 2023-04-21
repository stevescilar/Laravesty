<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// user session
class AuthController extends Controller
{
    public function create() {
        // create user
        return inertia('Auth/Login');
    }

    public function store() {
        // save user
    }

    public function destroy(){
        // logout
    }
}
