<?php namespace App\Providers;

use App\User;
use App\Providers\AuthUserProvider;
use Illuminate\Support\ServiceProvider;

class CustomAuthProvider extends ServiceProvider {
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['auth']->extend('customAuth',function()
        {
            //return new CustomUserProvider(new User);
            return new AuthUserProvider;
        });
    }

        /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}