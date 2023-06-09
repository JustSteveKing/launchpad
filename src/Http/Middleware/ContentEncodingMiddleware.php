<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\Http\Middleware;

use Closure;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class ContentEncodingMiddleware
{
    public function handle(Request $request, Closure $next): Response|JsonResponse
    {
        $response = $next($request);

        $response->header('Content-Encoding', 'gzip');
        $response->setContent(gzencode($response->getContent(), 9));

        return $response;
    }
}
