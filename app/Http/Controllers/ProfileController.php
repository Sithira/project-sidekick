<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function myQuestions()
    {

        $questions = auth()->user()->questions;

        $questions = $questions->load(['answers', 'replies', 'answers.replies']);

        return view('user.questions', compact('questions'));

    }

    public function myProposals()
    {
        $proposals = auth()->user()->proposals;

        $proposals = $proposals->load(['project', 'project.user']);

        return view('user.proposals', compact('proposals'));
    }

}
