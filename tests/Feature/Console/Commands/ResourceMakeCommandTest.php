<?php declare(strict_types=1);

namespace JustSteveKing\Laravel\ApiToolkit\Tests\Feature\Console\Commands;

use JustSteveKing\Laravel\ApiToolkit\Tests\TestCase;

class ResourceMakeCommandTest extends TestCase
{
    protected string $name = 'Model';

    protected function callCommand()
    {
        return $this->artisan("api-toolkit:resource {$this->name}");
    }

    /**
     * @test
     */
    public function our_command_runs_correctly()
    {
        $command = $this->callCommand();
        $command->assertExitCode(0);
    }

    /**
     * @test
     */
    public function we_can_create_a_model()
    {
        $command = $this->callCommand();
        $command->expectsOutput("Generating boilerplate for {$this->name}");
        $command->expectsOutput("Creating Model and Migration for {$this->name}");

        $this->assertTrue(
            file_exists(app_path() . "/Models/{$this->name}.php")
        );
    }

    /**
     * @test
     */
    public function we_can_create_a_factory()
    {
        $command = $this->callCommand();
        $command->expectsOutput("Generating boilerplate for {$this->name}");
        $command->expectsOutput("Creating Factory for {$this->name}");

        $this->assertTrue(
            file_exists(database_path() . "/factories/{$this->name}Factory.php")
        );
    }

    /**
     * @test
     */
    public function we_can_create_a_seeder()
    {
        $command = $this->callCommand();
        $command->expectsOutput("Generating boilerplate for {$this->name}");
        $command->expectsOutput("Creating Seeder for {$this->name}");
        $this->assertTrue(
            file_exists(database_path() . "/seeds/{$this->name}Seeder.php")
        );
    }

    /**
     * @test
     */
    public function we_can_create_a_policy()
    {
        $command = $this->callCommand();
        $command->expectsOutput("Creating Model Policy for {$this->name}");
        $this->assertTrue(
            file_exists(app_path() . "/Policies/{$this->name}Policy.php")
        );
    }

    /**
     * @test
     */
    public function we_can_create_our_form_requests()
    {
        $command = $this->callCommand();

        foreach (config('api-toolkit.form_requests') as $request) {
            $command->expectsOutput("Creating {$request} for model {$this->name}");
            $this->assertTrue(
                file_exists(app_path() . "/Http/Requests/Api/{$this->name}/{$request}.php")
            );
        }
    }

    /**
     * @test
     */
    public function we_can_create_an_api_resource()
    {
        $command = $this->callCommand();
        $command->expectsOutput("Creating API Resource for {$this->name}");
        $this->assertTrue(
            file_exists(app_path() . "/Http/Resources/{$this->name}Resource.php")
        );
    }

    /**
     * @test
     */
    public function we_can_create_our_controllers()
    {
        $command = $this->callCommand();

        foreach (config('api-toolkit.controllers') as $controller) {
            $command->expectsOutput("Creating {$controller['name']} for model {$this->name}");
            $this->assertTrue(
                file_exists(app_path() . "/Http/Controllers/{$this->name}/{$controller['name']}.php")
            );
        }
    }
}
