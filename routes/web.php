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

// profile 

Route::get('/profile/{user_id}', 'ProfilesController@index');

Route::get('/profile/{user_id}/create', 'ProfilesController@create');

Route::post('/profile/{user_id}', 'ProfilesController@store');

Route::get('/profile/{user_id}/edit', 'ProfilesController@edit');

Route::patch('/profile/{user_id}', 'ProfilesController@update');

// project
Route::get('/profile/{users_id}/project/{project_id}', 'ProjectsController@index');

Route::get('/project/create', 'ProjectsController@create');

Route::post('/project', 'ProjectsController@store');

Route::get('/profile/{user_id}/project/{project_id}/edit', 'ProjectsController@edit');

Route::patch('/profile/{user_id}/project/{project_id}', 'ProjectsController@update');

Route::delete('/profile/{user_id}/project/{project_id}', 'ProjectsController@destroy'); 



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
