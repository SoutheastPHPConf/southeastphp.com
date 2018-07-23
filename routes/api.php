<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('emails', ['uses' => 'Api\EmailController@index']);
Route::post('email', ['uses' => 'Api\EmailController@store']);
Route::get('nashville', ['uses' => 'Api\NashvilleController@index']);
Route::get('speakers', ['uses' => 'Api\SpeakerController@index']);
Route::get('keynotes', ['uses' => 'Api\KeynoteSpeakerController@index']);

/**
 * Organizers Routes
 */
Route::get('organizers', ['uses' => 'Api\OrganizersController@index']);

Route::post('login', ['uses' => 'Api\Auth\LoginController@login']);

Route::get('login/facebook', ['uses' => 'Api\Auth\FacebookController@facebookLogin']);
Route::get('login/facebook/callback', ['uses' => 'Api\Auth\FacebookController@handleFacebookCallback']);

Route::get('login/github', ['uses' => 'Api\Auth\GithubController@githubLogin']);
Route::get('login/github/callback', ['uses' => 'Api\Auth\GithubController@handleGithubCallback']);

Route::post('contact', ['uses' => 'Api\ContactController@create']);

/**
 * Sponsor Routes
 */
Route::get('sponsors', ['uses' => 'Api\SponsorsController@index']);
Route::get('sponsors/levels', ['uses' => 'Api\SponsorLevelsController@index']);
Route::get('sponsors/top', ['uses' => 'Api\Sponsors\TopSponsorsController@index']);
Route::get('sponsors/front-page', ['uses' => 'Api\SponsorsController@fetch']);

Route::post('tickets/diversity', ['uses' => 'Api\DiversityController@create']);

Route::post('admin/sponsors/image', ['uses' => 'Api\Admin\SponsorsImageController@create']);
Route::post('admin/sponsors', ['uses' => 'Api\Admin\SponsorsController@create']);

Route::post('register', ['uses' => 'Auth\RegisterController@create']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('profile', ['uses' => 'Api\UserController@fetch']);
    Route::post('profile', ['uses' => 'Api\UserController@create']);
});
