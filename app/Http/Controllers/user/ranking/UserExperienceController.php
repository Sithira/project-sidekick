<?php

namespace App\Http\Controllers\user\ranking;

use App\Http\Controllers\Controller;
use App\Models\UserExperience;
use Illuminate\Http\Request;

class UserExperienceController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $experiences = auth()->user()->experience;

        return view('user.ranking.experience.index', compact('experiences'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('user.ranking.experience.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|min:5',
            'description' => 'required|min:10'
        ]);

        auth()->user()->experience()->create($request->all());

        flash()->success('Experience added successfully');

        return redirect()->back();

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $experience = UserExperience::findOrFail($id);

        return view('user.ranking.experience.edit', compact('experience'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $experience = UserExperience::findOrFail($id);

        $experience->update($request->all());

        flash()->success('Successfully updated.');

        return redirect()->back();
    }
}
