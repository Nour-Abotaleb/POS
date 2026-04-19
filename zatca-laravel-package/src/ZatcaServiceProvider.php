<?php

namespace YourVendor\ZatcaLaravel;

use Illuminate\Support\ServiceProvider;
use YourVendor\ZatcaLaravel\Services\ZatcaService;

class ZatcaServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ZatcaService::class, function ($app) {
            return new ZatcaService();
        });

        $this->mergeConfigFrom(
            __DIR__ . '/../config/zatca.php',
            'zatca'
        );
    }

    public function boot()
    {
        // Publish config
        $this->publishes([
            __DIR__ . '/../config/zatca.php' => config_path('zatca.php'),
        ], 'zatca-config');

        // Publish migrations
        $this->publishes([
            __DIR__ . '/../database/migrations/' => database_path('migrations'),
        ], 'zatca-migrations');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Register commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\ZatcaReportCommand::class,
                Commands\ZatcaTestCommand::class,
            ]);
        }
    }
}