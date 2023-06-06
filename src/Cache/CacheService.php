<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\Cache;

use Closure;
use Illuminate\Contracts\Cache\Repository;
use JustSteveKing\Launchpad\Contracts\CacheExpiry;
use JustSteveKing\Launchpad\Contracts\CacheKey;

final readonly class CacheService
{
    public function __construct(
        private Repository $repository,
    ) {}

    public function remember(CacheKey $key, CacheExpiry $expiry, Closure $callback): mixed
    {
        return $this->repository->remember(
            key: $key->value,
            ttl: $expiry->value,
            callback: $callback,
        );
    }
}
