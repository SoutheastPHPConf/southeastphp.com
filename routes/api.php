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

/**
 * Organizers Routes
 */
Route::get('organizers', ['uses' => 'Api\OrganizersController@index']);