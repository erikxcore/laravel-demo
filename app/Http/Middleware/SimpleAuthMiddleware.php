<?php

namespace App\Http\Middleware;
use Log;
use Closure;
use Illuminate\Contracts\Auth\Guard;

class SimpleAuthMiddleware
{

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        //Log::info("attempting to construct midle ware for auth");
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if ($this->auth->guest()) {
            //Log::info("redirecting guest");
                return redirect()->guest('auth/login');
        }

            //Log::info("test from simple auth mw");

    //  return Auth::onceBasic('name') ?: $next($request);

        return $next($request);
           // return Auth::check() ?: $next($request);
            //return Auth::onceBasic('name') ?: $next($request);
           // return $next($request);
    }
}
