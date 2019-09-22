<?php

namespace App\Http\Controllers\web;

use App\Http\PointsService;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeopleController extends Controller
{

    public function index()
    {

        $people = User::all();

        foreach ($people as $person) {
            return PointsService::calculateUserPoints($person);
        }

        return view('public.people.all-people', compact('people'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id)->load(['projects', 'questions', 'replies', 'answers']);

        return view('public.people.single-person', compact('user'));
    }
}
