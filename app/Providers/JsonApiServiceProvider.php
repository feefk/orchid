<?php

namespace App\Providers;

use App\Extensions\Dingo\NoDataArraySerializer;
use Dingo\Api\Transformer\Adapter\Fractal;
use Illuminate\Support\ServiceProvider;
use League\Fractal\Manager;

class JsonApiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('League\Fractal\Manager', function($app) {
            $fractal = new Manager();
            $serializer = new NoDataArraySerializer();
            $fractal->setSerializer($serializer);

            return $fractal;
        });

        $this->app->bind('Dingo\Api\Transformer\Adapter\Fractal', function($app) {
            $fractal = $app->make('\League\Fractal\Manager');

            return new Fractal($fractal);
        });
    }
}
