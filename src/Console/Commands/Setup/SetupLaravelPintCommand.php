<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\Console\Commands\Setup;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Throwable;

final class SetupLaravelPintCommand extends Command
{
    protected $signature = 'setup:laravel-pint';

    protected $description = 'Setup the Laravel Pint configuration.';

    public function handle(): int
    {
        $this->components->info(
            string: 'Publishing Laravel Pint configuration.',
        );

        try {
            File::put(
                path: base_path(path: 'pint.json'),
                contents: File::get(
                    path: __DIR__ . '/../../../../stubs/pint.json',
                ),
            );
        } catch (Throwable $exception) {
            $this->components->error(
                string: $exception->getMessage(),
            );

            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}
