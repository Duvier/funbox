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
    return view('Auth.login');
});

Route::get('Class', function () {
    return view('templates/class');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*---- Módulo User ----*/
	Route::get('user/all', 'UserController@getAll');
	Route::post('user/changeState', 'UserController@changeState');
	Route::get('user/restore/{id}' , 'UserController@restore');
	Route::get('user/delete/{id}/{logical?}', 'UserController@delete');
	Route::resource('user' , 'UserController',['except' => ['show', 'create', 'edit']]);
/*---- Módulo class_schedules ----*/
	Route::get('classSchedules/all', 'ClassSchedulesController@getAll');
	Route::get('classSchedules/restore/{id}' , 'ClassSchedulesController@restore');
	Route::get('classSchedules/delete/{id}/{logical?}', 'ClassSchedulesController@delete')->name('classSchedules.delete');
	Route::resource('classSchedules' , 'ClassSchedulesController',['except' => ['show', 'create', 'edit']]);