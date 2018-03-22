<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (\App::environment('production')) {
            \URL::forceScheme('https');
        }

        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->booted(function () {
                      \Route::middleware('web')
                ->namespace('App\Http\Controllers')
                ->group(function () {
                    \Route::get('/clear-cache', function () {
                        \Artisan::call('cache:clear');
                        return redirect()->back();
                    })->name('clear-cache');
                    \Route::post('/send', 'SendController@send')->name('front.send.post');
                    \Route::get('{page?}', 'PageController@show')
                        ->where('page', '^[A-Za-z-0-9-]+')
                        ->name('front.pages');
                });
        });
    }
}
