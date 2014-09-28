<?php namespace App\Providers;


use App\Repositories\UserRepository;
use App\Services\UserService;
use App\User;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider{


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('user.repo', function(){
            return new UserRepository(new User);
        });

        $this->app->bind('UserService', function($app){
            return new UserService($app['user.repo']);
        });
    }
}