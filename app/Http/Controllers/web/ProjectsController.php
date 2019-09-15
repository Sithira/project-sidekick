<?php

namespace App\Http\Controllers\web;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::with(['proposals', 'skills', 'documents'])
            ->whereNull('accepted_on')
            ->get();

        return view('public.projects.all-projects', compact('projects'));
    }

}
