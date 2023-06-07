<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\ValueObjects\Concerns;

trait HasNumberValue
{
    public function __construct(
        private readonly int $value,
    ) {}

    public function value(): int
    {
        return $this->value;
    }
}
