<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\ValueObjects;

use JustSteveKing\Launchpad\ValueObjects\Concerns\HasStringValue;

use const FILTER_VALIDATE_EMAIL;

final class Email
{
    use HasStringValue;

    public function validate(): bool
    {
        return (bool) filter_var(
            value: $this->value,
            filter: FILTER_VALIDATE_EMAIL,
        );
    }
}
