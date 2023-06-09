<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\Http\Middleware;

use Closure;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use JustSteveKing\Launchpad\Http\Exceptions\DuplicateRequestException;
use Treblle\Tools\Http\Enums\Status;

final class DeduplicateRequestsMiddleware
{
    public function handle(Request $request, Closure $next): Response|JsonResponse
    {
        $fingerprint = $request->fingerprint();

        if (Cache::has($fingerprint)) {
            throw new DuplicateRequestException(
                message: 'This is a duplicate request',
                code: Status::CONFLICT->value,
            );
        }

        Cache::put($fingerprint, true, now()->addMinutes(5));

        return $next($request);
    }
}
