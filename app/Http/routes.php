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

    /* Grupos de permissões */
    Route::get('/acl_group',['middleware' => 'AclPermittedFilter','uses' => 'Api\AclGroup@index']);
    Route::post('/acl_group/add',['middleware' => 'AclPermittedFilter','uses' => 'Api\AclGroup@add']);
    Route::post('/acl_group/edit',['middleware' => 'AclPermittedFilter','uses' => 'Api\AclGroup@edit']);
    /* Fim das permissoes de grupos */

    /* Permissoes */
    Route::get('/acl_permissions',['middleware' => 'AclPermittedFilter','uses' => 'Api\AclPermissions@index']);
    Route::post('/acl_permissions/add',['middleware' => 'AclPermittedFilter','uses' => 'Api\AclPermissions@add']);
    Route::post('/acl_permissions/edit',['middleware' => 'AclPermittedFilter','uses' => 'Api\AclPermissions@edit']);
    /* Permissoes */


    Route::get('/user_data',['middleware' => 'AclPermittedFilter','uses' => 'Api\User@index']);
    Route::get('/posts',  'PostController@index');
});
Route::get('/generate/models', '\\Jimbolino\\Laravel\\ModelBuilder\\ModelGenerator5@start');

