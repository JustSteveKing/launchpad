<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\Concerns;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\Response;
use JustSteveKing\HttpHelpers\Enums\Method;

/**
 * @property-read PendingRequest $request
 */
trait SendsRequests
{
    /**
     * @param Method $method
     * @param string $uri
     * @param array $options
     * @return Response
     * @throws RequestException
     */
    public function send(Method $method, string $uri, array $options = []): Response
    {
        return $this->request->send(
            method: $method->value,
            url: $uri,
            options: $options,
        )->throw();
    }
}
