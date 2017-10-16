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
    return view('home');
});


Route::get('login/facebook', 'AuthController@redirectToFacebook');
Route::get('login/facebook/callback', 'AuthController@getFacebookCallback');
Route::get('login/google', 'AuthController@redirectToGoogle');
Route::get('login/google/callback', 'AuthController@getGoogleCallback');
Route::get('/complete-social',[
	'uses'=> 'AuthController@completeSocial',
	'as'=>'auth.signup']
	);

Auth::routes();
