<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\ValueObjects\Concerns;

trait HasStringValue
{
    public function __construct(
        private readonly string $value,
    ) {}

    public function value(): string
    {
        return $this->value;
    }
}
