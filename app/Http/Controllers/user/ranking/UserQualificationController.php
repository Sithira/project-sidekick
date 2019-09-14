<?php

namespace App\Http\Controllers\user\ranking;

use App\Models\UserQualification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserQualificationController extends Controller
{

    public function index()
    {
        $qualifications = auth()->user()->qualifications;

        return view('user.ranking.qualification.index', compact('qualifications'));
    }


    public function edit($id)
    {
        $qualification = UserQualification::findOrFail($id);

        return view('user.ranking.qualification.edit', compact('qualification'));
    }

    public function update(Request $request, $id)
    {



        $qualification = UserQualification::findOrFail($id);

        $qualification->update($request->all());

        flash()->success('Successfully updated.');

        return redirect()->back();
    }
}
