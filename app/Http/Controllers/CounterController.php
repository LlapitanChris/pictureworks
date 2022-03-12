<?php

namespace App\Http\Controllers;
use App\Counter;
use Auth;
use App\User;
use Carbon\Carbon;

use Illuminate\Http\Request;

class CounterController extends Controller
{
    protected $dateToday;
    protected $dateYesterday;

    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(Request $request){
        $this->dateToday = Carbon::now();
        $this->dateYesterday = Carbon::yesterday()->yesterday();
        $authUser = Auth::user();
        $clicks = $authUser->counters;

        $existToday = $clicks->where('date_clicked', $this->dateToday->toDateString())->first();

        if($existToday) {
            $existToday->click_counts = $request->counts;
        } else {
            $existToday = new Counter;
            $existToday->click_counts = $request->counts;
            $existToday->user_id = Auth::id();
            $existToday->date_clicked = $this->dateToday->toDateString();
        }
        
        $existToday->save();
        return json_encode($existToday);
  }
}
