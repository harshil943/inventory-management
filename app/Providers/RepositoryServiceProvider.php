<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\Interfaces\OrderInterface','App\Repositories\orderRepository');
        $this->app->bind('App\Repositories\Interfaces\productInterface','App\Repositories\productRepository');
        $this->app->bind('App\Repositories\Interfaces\designationInterface','App\Repositories\designationRepository');
        $this->app->bind('App\Repositories\Interfaces\employeeInterface','App\Repositories\employeeRepository');
        $this->app->bind('App\Repositories\Interfaces\userInterface','App\Repositories\userRepository');
        $this->app->bind('App\Repositories\Interfaces\quotationInterface','App\Repositories\quotationRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
