<?php

namespace App\Http\Controllers;
use App\Medicament;


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
        $countMeds = Medicament::count();
        return view('home',compact('countMeds'));
    }
}
