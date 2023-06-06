<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\Console\Commands\Setup;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Throwable;

final class SetupPhpstanCommand extends Command
{
    protected $signature = 'setup:phpstan';

    protected $description = 'Setup the PHPStan configuration.';

    public function handle(): int
    {
        $this->components->info(
            string: 'Publishing PHPStan configuration.',
        );

        try {
            File::put(
                path: base_path(path: 'phpstan.neon'),
                contents: File::get(
                    path: __DIR__ . '/../../../../stubs/phpstan.neon',
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
