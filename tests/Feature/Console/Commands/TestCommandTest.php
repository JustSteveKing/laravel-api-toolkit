<?php declare(strict_types=1);

namespace JustSteveKing\Laravel\ApiToolkit\Tests\Feature\Console\Commands;

use JustSteveKing\Laravel\ApiToolkit\Tests\TestCase;

class TestCommandTest extends TestCase
{
    /**
     * @test
     */
    public function the_test_command_works()
    {
        $this->artisan('api-toolkit:test')->assertExitCode(0);
    }
}
