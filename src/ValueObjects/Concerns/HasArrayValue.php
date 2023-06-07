<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\ValueObjects\Concerns;

trait HasArrayValue
{
    public function __construct(
        private readonly array $value,
    ) {}

    public function value(): array
    {
        return $this->value;
    }
}
