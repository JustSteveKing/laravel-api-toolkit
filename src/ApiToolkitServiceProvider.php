<?php declare(strict_types=1);

namespace JustSteveKing\Laravel\ApiToolkit;

use Illuminate\Support\ServiceProvider;

class ApiToolkitServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the API Toolkit
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/api-toolkit.php' => config_path('api-toolkit.php'),
            ], 'config');

            // publish any resources

            $this->commands([
                \JustSteveKing\Laravel\ApiToolkit\Console\Commands\TestCommand::class
            ]);
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/api-toolkit.php',
            'api-toolkit'
        );
    }
}
