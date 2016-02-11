<?php

namespace Sun\Provider;

use Sun\Contracts\Application as App;

class CountryProvider
{
    /**
     * @var \Sun\Contracts\Application
     */
    protected $app;

    /**
     * Create a new instance
     *
     * @param \Sun\Contracts\Application $app
     */
    public function __construct(App $app)
    {
        $this->app = $app;
    }

    /**
     * Bootstrap service
     */
    public function bootstrap()
    {
        $this->app->bind('Sun\Contract\Country', 'Sun\Country');
    }

    /**
     * Register route
     */
    public function registerRoute()
    {
        return [

        ];
    }

    /**
     * Dispatch service
     */
    public function dispatch()
    {
        //
    }

    /**
     * Publish assets
     *
     * @return array
     */
    public function publish()
    {
        return [

        ];
    }
}