<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class osuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $socialite = $this->app->make('Laravel\Socialite\Contracts\Factory');
        $socialite->extend(
            'osu',
            function ($app) use ($socialite) {
                $config = $app['config']['services.osu'];
                return $socialite->buildProvider(osuProvider::class, $config);
            }
        );
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
