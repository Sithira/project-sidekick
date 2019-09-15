<?php

namespace App\Http\Controllers\user\projects;

use App\Models\Project;
use App\Models\ProjectProposal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $project = Project::where('user_id', auth()->id)->where('id', $id)->first();

        $project = $project->load(['proposals']);

        return view('user.proposals.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $project = Project::findOrFail($id);

        return view('user.proposals.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        $project = Project::findOrFail($id);

        $project->proposals()
            ->create(array_merge($request->all(), ['user_id' => auth()->id()]));

        flash()->success('Proposed successfully');

        return redirect()->back();

    }

    public function approveOrReject($id, $subId)
    {
        $project = Project::findOrFail($id);

        $proposal = ProjectProposal::findOrFail($subId);

        $project->update([
            'proposal_id' => $proposal->id,
            'accepted_on' => now()->toDateString()
        ]);

        $proposal->update(['is_accepted' => 1]);

        flash()->success('Proposal has been successfully accepted');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
