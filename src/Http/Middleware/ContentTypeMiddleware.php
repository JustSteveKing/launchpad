<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\Http\Middleware;

use Closure;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class ContentTypeMiddleware
{
    public function handle(Request $request, Closure $next): Response|JsonResponse
    {
        $response = $next($request);

        $response->header('Content-Type', 'application/vnd.api+json');

        return $response;
    }
}
