<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\Http\Middleware;

use Closure;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

final class CacheResponseMiddleware
{
    public function handle(Request $request, Closure $next): Response|JsonResponse
    {
        $fingerprint = $request->fingerprint();

        if (Cache::has($fingerprint)) {
            return Cache::get($fingerprint);
        }

        $response = $next($request);

        Cache::put($fingerprint, $response, now()->addMinutes(5));

        return $response;
    }
}
