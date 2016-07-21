<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\CustomUser;
use Log;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Client;
use Session;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $loginPath = '/auth/login';
    protected $redirectTo = '/';
    protected $redirectAfterLogout = '/';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    protected function validator(array $data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return redirect('/auth/login')
                ->withInput()
                ->withErrors($validator);
        }

        return $validator;

    }

    protected function create(array $data)
    {
        /*
        return User::create([
            'name' => $data['name'],
            'password' => bcrypt($data['password']),
        ]);
        */
    }

    public function authenticate(){
    
         //Log::info('overridden authenticate');

    }

  public function getLogout()
    {
        //Log::info('attempting to log out');
        //$this->auth->logout();
        //Auth::logout(); //causes issues because of remember token


        Session::flush();
        //event('auth.logout', [$user]);

        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }


    public function login(UserContract $user, $remember = false){
      //  Log::info('test from login');

    }


    public function postLogin(Request $request)
    {

        $this->validate($request, [
            'name' => 'required', 'password' => 'required',
        ]);
        
        $credentials  = array('name' => $request->name, 'password' => $request->password);
        
        $user = new CustomUser;

        $user->name = $request->name;
        $user->password  = $request->password;
        $user->id = $request->name;

        //Log::info("Status of auth guest pre login attempt : " . Auth::guest());

        if(Auth::attempt($credentials)){
                //$user->jwt = Session::get('jwt');
                //Log::info("This user's JWT is " . $user->jwt);

                //Log::info("Attempting to redirect here : " .$this->redirectPath());
                ///Log::info("Attempting to redirect here 2 : " . redirect()->intended($this->redirectPath()));
                //$intended_url = Session::get('url.intended', url('/'));
                //Log::info("Intended : " . $intended_url);
                //$this->redirectTo = redirect()->intended($this->redirectPath());

                //Log::info("this redirec to : " . $this->redirectTo);
                //dd(redirect()->intended($this->redirectPath()));
                //return redirect($this->redirectPath());
                //return redirect('/');
                //Log::info("Status of auth guest : " . Auth::guest());
                //Log::info("Status of auth check after succesful auth attempt : " . Auth::check());
                //Session::set('test', 'test');
                //return redirect($intended_url);
                //return redirect('/');
                return redirect()->intended($this->redirectPath());

                //Log::info("this should not display");
        }

            return redirect('/auth/login')
                ->withInput($request->only('name'))
                ->withErrors([
                    'name' => 'Incorrect username or password',
                ]);
    }


}
