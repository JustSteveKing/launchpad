<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\Console\Commands\Make;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

final class MakeDomainDirectoryCommand extends Command
{
    protected $signature = 'make:domain { name? : The name of the domain.}';

    protected $description = 'Create a new Domain Directory.';

    public function handle(): int
    {
        $name = $this->argument(
            key: 'name',
        ) ?? $this->components->ask(
            question: 'What is the name of the domain you want to create?',
        );

        $parts = Str::of(
            string: $name,
        )->explode(
            delimiter: ' ',
        )->map(fn (string $part) => Str::title(value: $part));

        $domain = Str::of(
            string: implode(
                separator: ' ',
                array: $parts->toArray(),
            ),
        )->replace(
            search: ' ',
            replace: '',
        )->toString();



        return Command::SUCCESS;
    }
}
