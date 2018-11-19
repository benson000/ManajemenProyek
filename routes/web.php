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

Route::get('/admin', function () {
    return view('admin');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){
	//all crud controller
	Route::resource('/activities', 'ActivitiesController');
	Route::resource('/budgets', 'BudgetsController');
	Route::resource('/categories', 'CategoriesController');
	Route::resource('/committees', 'CommitteesController');
	Route::resource('/events', 'EventsController');
	Route::resource('/participants', 'ParticipantsController');
});
