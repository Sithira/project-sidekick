<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('projects', 'web\ProjectsController@index')->name('public-projects');
Route::get('projects/{id}', 'web\ProjectsController@show')->name('pub-proj-show');

Route::get('people', 'web\PeopleController@index')->name('public-people');
Route::get('people/{id}', 'web\PeopleController@show')->name('single-person');

// forum
Route::get('/forum', 'PublicQARController@index');
Route::get('/forum/question/{id}', 'PublicQARController@fromQuestionID')
    ->name('forum.by-q-id');

Route::group(['middleware' => 'auth'], function() {

    Route::post('/forum/question/{id}/answer/{subId}/accept', 'PublicQARController@acceptAsAnswer')
        ->name('accept-answer');

    Route::post('/forum/question/{id}/upvote', 'PublicQARController@postUpVoteQuestion')
        ->name('question.upvote');
    Route::post('/forum/question/{id}/downvote', 'PublicQARController@postDownVoteQuestion')
        ->name('question.downvote');

    Route::post('/forum/answer/{id}/update', 'PublicQARController@postUpVoteAnswer')
        ->name('answer.upvote');

    Route::post('/forum/answer/{id}/downvote', 'PublicQARController@postDownVoteAnswer')
        ->name('answer.downvote');

    Route::get('/forum/ask', 'PublicQARController@viewQuestionForm')->name('questions.ask');

    Route::post('forum/question', 'PublicQARController@postQuestion')->name('questions.submit');
    Route::post('forum/question/{id}/answer', 'PublicQARController@postAnswerForQuestion')->name('questions.answer');
    Route::post('forum/question/{id}/reply', 'PublicQARController@replyForQuestion')->name('questions.reply');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/profile', 'HomeController@index')->name('home');

    Route::get('/profile/questions', 'ProfileController@myQuestions');
    Route::get('/profile/proposals', 'ProfileController@myProposals');

    Route::resource('/profile/skills', 'user\ranking\UserSkillController');
    Route::resource('/profile/experience', 'user\ranking\UserExperienceController');
    Route::resource('/profile/qualifications', 'user\ranking\UserQualificationController');

    Route::resource('/profile/projects/{id}/proposals', 'user\projects\ProposalController');
    Route::post('/profile/projects/{id}/proposals/{subId}', 'user\projects\ProposalController@approveOrReject')
        ->name('approveOrRejectProposal');
    Route::resource('/profile/projects', 'user\projects\ProjectController');

    // add - my proposals
});
