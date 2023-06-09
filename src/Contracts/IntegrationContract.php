<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\Contracts;

use Illuminate\Http\Client\Response;
use JustSteveKing\HttpHelpers\Enums\Method;

interface IntegrationContract
{
    public function send(Method $method, string $uri, array $options = []): Response;
}
