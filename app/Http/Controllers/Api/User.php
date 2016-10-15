<?php namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller as BaseController;
use LucaDegasperi\OAuth2Server\Authorizer;
use Illuminate\Http\Response;

class User extends BaseController {

    public function index(Authorizer $authorizer){
        $user_id=$authorizer->getResourceOwnerId(); // the token user_id
        $user=\App\User::find($user_id)->toArray();// get the user data from database
        return response()->json($user);
    }

}
