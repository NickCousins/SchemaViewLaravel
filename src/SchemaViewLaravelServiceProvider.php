<?php

namespace nickcousins\SchemaViewLaravel;

use Illuminate\Support\ServiceProvider;
use nickcousins\SchemaViewLaravel\SchemaView;

class SchemaViewLaravelServiceProvider extends ServiceProvider
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
        $this->registerSchemaViewCommand();

        $this->commands('schema');
    }

    private function registerSchemaViewCommand()
    {
        $this->app['schema'] = $this->app->share(function($app)
        {
            return new SchemaView;
        });
    }
}
