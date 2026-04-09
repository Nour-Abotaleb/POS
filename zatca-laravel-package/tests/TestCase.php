<?php

namespace YourVendor\ZatcaLaravel\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use YourVendor\ZatcaLaravel\ZatcaServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    protected function getPackageProviders($app): array
    {
        return [
            ZatcaServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');
        config()->set('database.connections.testing', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        config()->set('zatca.environment', 'simulation');
        config()->set('zatca.queue.enabled', false);
        config()->set('zatca.logging.enabled', false);
    }
}