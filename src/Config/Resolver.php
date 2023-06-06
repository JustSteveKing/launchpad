<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\Config;

use Illuminate\Contracts\Config\Repository;

final readonly class Resolver
{
    public function __construct(
        private Repository $config,
    ) {
    }

    public function string(string $key, null|string $default = null): string
    {
        return (string) $this->config->get(
            key: $key,
            default: $default,
        );
    }

    public function number(string $key, null|int $default = null): int
    {
        return (int) $this->config->get(
            key: $key,
            default: $default,
        );
    }

    public function float(string $key, null|bool $default = null): float
    {
        return (float) $this->config->get(
            key: $key,
            default: $default,
        );
    }

    public function boolean(string $key, null|bool $default = null): bool
    {
        return (bool) $this->config->get(
            key: $key,
            default: $default,
        );
    }

    public function array(string $key, null|array $default = null): array
    {
        return (array) $this->config->get(
            key: $key,
            default: $default,
        );
    }
}
