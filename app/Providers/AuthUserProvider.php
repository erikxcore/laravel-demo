<?php

namespace App\Providers;

use Log;
use Auth;
use Session;

use Illuminate\Contracts\Auth\UserProvider;

use App\CustomUser;
use Carbon\Carbon;
use Illuminate\Auth\GenericUser;
use Illuminate\Contracts\Auth\Authenticatable;

use GuzzleHttp\Client;
use Illuminate\Http\Request;


use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Auth\UserProviderInterface;
//use Illuminate\Auth\GenericUser;

class AuthUserProvider implements UserProvider {

  private $user;

  public function __construct()
  {
      $this->user = null;
  }

  public function retrieveByID($id)
  {
  	  //Log::info('test from retrieve by id');

      //$user = new CustomerUser;
      //$user->name = "Eric";

      //return $user;
  	  return new \Exception('not implemented');
  }

  public function retrieveByCredentials(array $credentials)
  {

      //this method would search for username based on form input username 
      //but here we're just bypassing

      $user = new CustomUser;

        $user->name = $credentials["name"];
        $user->password = $credentials["password"];

      return $user;
  }

    public function validateCredentials(Authenticatable $user, array $credentials)
    { 

        $client = new Client();
        $res = $client->request('post', 'http://immense-gorge-22729.herokuapp.com/api/authenticate',
            [
            'form_params' => [
                'name' => $user->name,
                'password' => $user->password
                             ]
            ]
        );

        $auth_response = json_decode($res->getBody());

            if($auth_response != null){
                if(isset($auth_response->token)){
                  Session::put('jwt', $auth_response->token);
                    return true;
                }
            }else{
              return false;
            }
    }


     
  public function retrieveByToken($identifier, $token)
  {
    return new \Exception('not implemented');
  }

  public function updateRememberToken(Authenticatable $user, $token)
  {

    //return true;
  }




}