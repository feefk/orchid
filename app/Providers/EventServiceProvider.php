<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Dingo\Api\Event\ResponseWasMorphed' => [
            'App\Listeners\AddStatusCodeToResponseListener'
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        if (\App::environment() != ENV_PROD) {
            // TODO:
            // http://stackoverflow.com/questions/27753868/how-to-get-the-query-executed-in-laravel-5-dbgetquerylog-returning-empty-arr
            // artisan start event
            \Event::listen('artisan.start', function ($application) {
                \DB::enableQueryLog();
            });

            \DB::listen(function($query) {
                $bindings = $query->bindings;
                $time = $query->time;
                $data = compact('bindings', 'time');

                // Format binding data for sql insertion
                foreach ($bindings as $i => $binding)
                {
                    if ($binding instanceof \DateTime)
                    {
                        $bindings[$i] = $binding->format('\'Y-m-d H:i:s\'');
                    }
                    else if (is_string($binding))
                    {
                        $bindings[$i] = "'$binding'";
                    }
                }

                // Insert bindings into query
                $query = str_replace(array('%', '?'), array('%%', '%s'), $query->sql);
                $query = vsprintf($query, $bindings);

                \Log::info($query, $data);
            });
        }
    }
}
