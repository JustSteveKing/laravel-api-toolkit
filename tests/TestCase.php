<?php declare(strict_types=1);

namespace JustSteveKing\Laravel\ApiToolkit\Tests;

use JustSteveKing\Laravel\ApiToolkit\ApiToolkitServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            ApiToolkitServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        // any specific env options that need to be set for this package to work
    }
}
