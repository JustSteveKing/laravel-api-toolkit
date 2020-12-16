<?php declare(strict_types=1);

namespace JustSteveKing\Laravel\ApiToolkit\Console\Commands;

use Illuminate\Console\Command;

class TestCommand extends Command
{
    public $signature = 'api-toolkit:test';

    public $description = 'A test command.';

    public function handle()
    {
        $this->comment('API Toolkit working.');
    }
}
