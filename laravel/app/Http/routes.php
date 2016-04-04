<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	$projects = Project::orderBy('created_at', 'desc')->get();
    return view('home', ['projects' => $projects]);
});

Route::group(['prefix' => 'admin'], function() {
	Route::auth();

	Route::resource('project', 'ProjectController', ['only' => ['index', 'create', 'store']]);
});
