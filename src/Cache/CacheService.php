<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\Cache;

use Closure;
use Illuminate\Support\Facades\Cache;
use JustSteveKing\Launchpad\Contracts\CacheExpiry;
use JustSteveKing\Launchpad\Contracts\CacheKey;

final class CacheService
{
    public function remember(CacheKey $key, CacheExpiry $expiry, Closure $callback): mixed
    {
        return Cache::remember(
            key: $key->value,
            ttl: $expiry->value,
            callback: $callback,
        );
    }
}
