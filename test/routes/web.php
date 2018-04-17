<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', 'userController@showAll');
Route::get('/user/{user}', 'userController@show');


Route::get('/login', 'loginController@index');
Route::post('/login/enter', 'loginController@enter');


Route::get('/signup', 'signupController@index');
Route::post('/signup', 'signupController@register');

Route::get('/placeappointments/{user}', 'AppointmentsController@index');
Route::post('/placeappointments/{user}', 'AppointmentsController@makeAppointment');

Route::get('/appointments', 'AppointmentsController@show');


Route::get('logout', 'Auth\LoginController@logout');

Route::get('bootstrap', function ()
{
	return view('layout');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');