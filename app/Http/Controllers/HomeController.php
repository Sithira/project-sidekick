<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mysql_xdevapi\Collection;

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

        $projects = $onGoing = auth()->user()->projects;


        $ongoing = $projects->where('accepted_on', null)->count();

        $completed = $projects->where('accepted_on',  '!=', null)->count();

        return view('home', compact('ongoing', 'completed'));
    }
}
