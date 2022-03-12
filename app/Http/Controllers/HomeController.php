<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $this->dateToday = Carbon::now();
        $this->dateYesterday = Carbon::yesterday()->yesterday();
        $user = Auth::user();
        $clicks = $user->counters;
        $existToday = $clicks->where('date_clicked', $this->dateToday->toDateString())->first();



        return view('home', ['user' => json_encode($user, true), 'existToday' => json_encode($existToday, true)]);
    }
}
