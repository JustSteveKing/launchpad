<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\Contracts;

use Illuminate\Foundation\Application;

interface FeatureBootLoaderContract extends SelfRegistersToContainer
{
    /**
     * Load routes for this feature into the Application.
     *
     * @param Application $app
     * @return void
     */
    public static function routes(Application $app): void;
}
