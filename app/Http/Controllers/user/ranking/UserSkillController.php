<?php

namespace App\Http\Controllers\user\ranking;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class UserSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $skillList = Skill::all()->pluck('name', 'id');

        $skills = auth()->user()->skills;

        return view('user.ranking.skill.index', compact('skills', 'skillList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skills = auth()->user()->skills->pluck('name', 'id')->toArray();

        return view('user.ranking.skill.create', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $skill = Skill::whereIn('id', $request->get('skills'));

        if (is_null($skill)) {
            $skill = Skill::create($request->all());
        }

        auth()->user()->skills()->sync($skill);

        flash()->success('Skills synced');

        return redirect()->back();
    }

}
