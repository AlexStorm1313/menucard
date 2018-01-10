<?php

namespace Alexstorm13\Menu;

use Illuminate\Support\ServiceProvider;

/**
 * Class MenuServiceProvider
 * @package Alexstorm13\Menu
 */
class MenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $routeServiceProvider = new RouteServiceProvider(ServiceProvider::class);
        $routeServiceProvider->map();
        $this->loadMigrationsFrom(base_path('packages/alexstorm13/zeus-menucard/database/migrations'));
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
