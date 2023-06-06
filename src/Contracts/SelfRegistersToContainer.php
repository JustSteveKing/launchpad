<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\Contracts;

use Illuminate\Foundation\Application;

interface SelfRegistersToContainer
{
    /**
     * Self register this to the DI container.
     *
     * @param Application $app
     * @return void
     */
    public static function register(Application $app): void;
}
