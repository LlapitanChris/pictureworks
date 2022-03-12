<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CounterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(Request $request){
        
    }
}
