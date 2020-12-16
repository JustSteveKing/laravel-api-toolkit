<?php declare(strict_types=1);

namespace JustSteveKing\Laravel\ApiToolkit\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use JustSteveKing\Laravel\ApiTookkit\ApiToolkitServiceProvider;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            ApiToolkitServiceProvider::class
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        // any specific env options that need to be set for this package to work
    }
}
