<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\Console\Commands\Stubs;

use Closure;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use SplFileInfo;
use Symfony\Component\Console\Command\Command as SymfonyCommand;

final class StubsPublishCommand extends Command
{
    protected $signature = 'launchpad:stubs {--force : Overwrite any existing files}';

    protected $description = 'Publish the opinionated stubs for Laravel Launchpad.';

    public function handle(): int
    {
        if (!$this->confirm(question: 'Are you sure you want to publish these?')) {
            return SymfonyCommand::FAILURE;
        }

        if (!is_dir($stubsPath = $this->laravel->basePath('stubs'))) {
            (new Filesystem())->makeDirectory($stubsPath);
        }

        $files = collect(
            File::files(__DIR__ . '/../../../stubs')
        )->unless(
            $this->option('force'),
            fn($files) => $this->unpublished($files)
        );

        $published = $this->publish($files);

        $this->components->info(
            string: "{$published} / {$files->count()} stubs published.",
        );

        return SymfonyCommand::SUCCESS;
    }

    public function unpublished(Collection $files): Collection
    {
        return $files->reject(function (SplFileInfo $file) {
            return file_exists($this->targetPath($file));
        });
    }

    public function publish(Collection $files): int|Closure
    {
        return $files->reduce(
            function (int $published, SplFileInfo $file) {
                file_put_contents($this->targetPath($file), file_get_contents($file->getPathname()));
                return $published + 1;
            },
            0,
        );
    }

    public function targetPath(SplFileInfo $file): string
    {
        return "{$this->laravel->basePath('stubs')}/{$file->getFilename()}";
    }
}
