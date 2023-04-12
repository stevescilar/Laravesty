<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //function goes here
     public function index()
     {
       return inertia('Index/Index');
     }

     public function show() 
     {
        return inertia('Index/Show');
     }
}
