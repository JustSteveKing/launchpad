<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\ValueObjects\Concerns;

trait HasBooleanValue
{
    public function __construct(
        private readonly bool $value,
    ) {}

    public function value(): bool
    {
        return $this->value;
    }
}
