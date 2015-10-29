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
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');



Route::get('/', function () {
    return view('index');
});


Route::get('/post', function(){
	return view('frontend.article');
});

Route::get('/about', function(){
	return view('frontend.about');
});

Route::get('/contact', function(){
	return view('frontend.contact');
});


Route::get('/backend', 'BackendController@index');
Route::get('/backend/create-user', 'BackendController@createUser');
Route::post('/backend/create-user', 'BackendController@createUser');
Route::get('/backend/update-user/{id}', 'BackendController@updateUser');
Route::post('/backend/update-user/{id}', 'BackendController@updateUser');
Route::get('/backend/delete-user/{id}', 'BackendController@deleteUser');
Route::get('/backend/tableusers', 'BackendController@showTable');
Route::get('/backend/tablearticles', 'BackendController@showTable');

Route::get('/backend/create-article', 'BackendController@updateArticle');
Route::post('/backend/create-article', 'BackendController@updateArticle');

