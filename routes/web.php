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

Route::group(['middleware' => ['auth']], function() {
    Route::get('/profile', 'HomeController@index')->name('home');

    Route::resource('/profile/skills', 'user\ranking\UserSkillController');
    Route::resource('/profile/experience', 'user\ranking\UserExperienceController');
    Route::resource('/profile/qualifications', 'user\ranking\UserQualificationController');

    Route::resource('/profile/projects', 'user\projects\ProjectController');
});
