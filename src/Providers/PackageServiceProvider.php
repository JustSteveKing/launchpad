<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use JustSteveKing\Launchpad\Cache\CacheService;
use JustSteveKing\Launchpad\Config\Resolver;
use JustSteveKing\Launchpad\Console\Commands\Stubs\StubsPublishCommand;
use JustSteveKing\Launchpad\Console\Commands\Setup\SetupLaravelPintCommand;
use JustSteveKing\Launchpad\Console\Commands\Setup\SetupPhpstanCommand;
use JustSteveKing\Launchpad\Database\Portal;
use JustSteveKing\Launchpad\Queue\DispatchableCommandBus;

final class PackageServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function provides(): array
    {
        return [
            CacheService::class,
            DispatchableCommandBus::class,
            Portal::class,
            Resolver::class,
        ];
    }

    public function register(): void
    {
        $this->commands(
            commands: [
                SetupPhpstanCommand::class,
                SetupLaravelPintCommand::class,
                StubsPublishCommand::class,
            ],
        );
        $this->app->singleton(
            abstract: Portal::class,
            concrete: Portal::class,
        );
        $this->app->singleton(
            abstract: DispatchableCommandBus::class,
            concrete: DispatchableCommandBus::class,
        );
        $this->app->singleton(
            abstract: Resolver::class,
            concrete: Resolver::class,
        );
        $this->app->singleton(
            abstract: CacheService::class,
            concrete: CacheService::class,
        );
    }
}
