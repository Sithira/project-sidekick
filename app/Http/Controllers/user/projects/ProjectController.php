<?php

namespace App\Http\Controllers\user\projects;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Skill;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = auth()->user()->projects->load(['skills', 'documents', 'proposals']);

        return view('user.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skills = Skill::all()->pluck('name', 'id');

        return view('user.projects.create', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $skills = $request->get('skills');

        $projectData = $request->except('skills');

        $projectData['expires_in'] = Carbon::parse($projectData['end_date'])
            ->addMonths(3)
            ->toDateString();

        $projectData['reference'] = Str::random(16);

        $project = auth()->user()->projects()->create($projectData);

        $project->skills()->sync($skills);

        flash()->success('Project submitted successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $project = Project::findOrFail($id)->load(['skills', 'documents', 'proposals']);

        return view('user.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::firstOrFail($id)->delete();

        flash()->success('Project removed successfully');
    }

    private function uploadFiles(Project $project, Request $request)
    {

        $filePath = storage_path() . '/' . auth()->id() . '/';

        $files = $request->get('files');

        foreach ($files as $file) {

            if ($file instanceof UploadedFile) {
                $fileUrl = $file->storeAs($filePath, Str::random(10));
                $project->documents()->create();
            }

        }

    }
}
