<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\GeoIp\GeoIpService;

class GeoIpProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\GeoIp\GeoIpServiceInterface', function () {
            return new GeoIpService();
        });
    }
}
