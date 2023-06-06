<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\Http\Controllers\Concerns;

use Inertia\ResponseFactory;

trait RendersInertiaComponent
{
    public function __construct(
        protected readonly ResponseFactory $response,
    ) {
    }
}
