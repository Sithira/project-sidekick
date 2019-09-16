<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class PublicQARController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::all()->pluck('name', 'id');

        $questions = Question::with(['answers', 'answers.replies', 'replies', 'categories'])->get();

        return view('public.questions.index', compact('questions', 'categories'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function fromQuestionID($id)
    {

        $question = Question::findOrFail($id);

        $question = $question->load(['answers', 'answers.replies', 'replies', 'categories']);

        return view('public.questions.show', compact('question'));

    }

    public function byCategory($category)
    {
        return 'bilal sirisena';
    }

    public function acceptAsAnswer($id, $subId)
    {
        $question = Question::findOrFail($id);

        $answer = Answer::findOrFail($subId);

        $answer->update(['is_accepted' => 1]);

        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postUpVoteQuestion($id)
    {

        $question = Question::findOrFail($id);

        $question->increment('likes');

        return redirect()->back();

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postDownVoteQuestion($id)
    {

        $question = Question::findOrFail($id);

        $question->increment('dislikes');

        return redirect()->back();

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postUpVoteAnswer($id)
    {
        $answer = Answer::findOrFail($id);

        $answer->increment('likes');

        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postDownVoteAnswer($id)
    {
        $answer = Answer::findOrFail($id);

        $answer->decrement('likes');

        return redirect()->back();
    }


    public function postQuestion(Request $request)
    {

        $categories = $request->get('categories');

        $question = auth()->user()->questions()->create($request->except('categories'));

        $question->categories()->sync($categories);

        flash()->success('Question posted successfully');

        return redirect()->back();

    }

    public function postAnswerForQuestion(Request $request, $id) {

        $question = Question::findOrFail($id);

        $question->answers()->create($request->all());

        flash()->success('Answer posted successfully');
    }


    public function viewQuestionForm()
    {
        $categories = Category::all()->pluck('name', 'id');

        return view('public.questions.create', compact('categories'));
    }

}
