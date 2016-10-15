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


Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::post('oauth/access_token', function() {
 return Response::json(Authorizer::issueAccessToken());
});

Route::group(['prefix'=>'api','before' => 'oauth'], function(){
    Route::get('/user_data',['middleware' => 'AclPermittedFilter','uses' => 'Api\User@index']);
    Route::get('/posts',  'PostController@index');
});
Route::get('/generate/models', '\\Jimbolino\\Laravel\\ModelBuilder\\ModelGenerator5@start');

