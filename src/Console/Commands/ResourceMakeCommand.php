<?php declare(strict_types=1);

namespace JustSteveKing\Laravel\ApiToolkit\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class ResourceMakeCommand extends Command
{
    public $signature = 'api-toolkit:resource {name : The name of the Model you want to generate}';

    public $description = 'Generate all the usual parts for an API Resource';

    public function handle()
    {
        $name = Str::studly($this->argument('name'));
        $this->comment("Generating boilerplate for {$name}");

        $this->makeModel($name);
        $this->makeFactory($name);
        $this->makeSeeder($name);
        $this->makePolicy($name);
        $this->makeFormRequests($name);
        $this->makeApiResource($name);
        $this->makeControllers($name);
    }

    protected function makeModel(string $name): void
    {
        $this->comment("Creating Model and Migration for {$name}");
        $this->call("make:model", [
            'name' => $name,
            '-m',
        ]);
    }

    protected function makeFactory(string $name): void
    {
        $this->comment("Creating Factory for {$name}");
        $this->call("make:factory", [
            'name' => "{$name}Factory",
            '--model' => $name,
        ]);
    }

    protected function makeSeeder(string $name): void
    {
        $this->comment("Creating Seeder for {$name}");
        $this->call("make:seeder", [
            'name' => sprintf(config('api-toolkit.seeder_name'), $name),
        ]);
    }

    protected function makePolicy(string $name): void
    {
        $this->comment("Creating Model Policy for {$name}");
        $this->call('make:policy', [
            'name' => sprintf(config('api-toolkit.policy_name'), $name),
            '--model' => $name,
        ]);
    }

    protected function makeFormRequests(string $name): void
    {
        foreach (config('api-toolkit.form_requests') as $request) {
            $this->comment("Creating {$request} for model {$name}");
            $this->call('make:request', [
                'name' => "Api\\{$name}\\{$request}",
            ]);
        }
    }

    protected function makeApiResource(string $name): void
    {
        $this->comment("Creating API Resource for {$name}");
        $this->call('make:resource', [
            'name' => sprintf(config('api-toolkit.resource_name'), $name),
        ]);
    }

    protected function makeControllers(string $name): void
    {
        foreach (config('api-toolkit.controllers') as $controller) {
            $this->comment("Creating {$controller['name']} for model {$name}");
            $this->call('make:controller', [
                'name' => "{$name}\\{$controller['name']}",
                implode(' ', $controller['options']),
            ]);
        }
    }
}
