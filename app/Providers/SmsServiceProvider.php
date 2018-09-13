<?php

namespace App\Providers;

use App\Services\Sms\SmsService;
use Illuminate\Support\ServiceProvider;
use App\Services\Sms\SmsServiceInterface;


class SmsServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Services\Sms\SmsServiceInterface', function () {
            return new SmsService();
        });
    }
}
