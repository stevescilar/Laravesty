<?php

namespace App\Http\Controllers;

use App\Models\Listing;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //function goes here
     public function index()
     {
       return inertia('Index/Index',
      
       [
        'message' => 'Hello from the other side!'
       ]
      );
     }

     public function show() 
     {
        return inertia('Index/Show');
     }
}
