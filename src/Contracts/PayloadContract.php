<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\Contracts;

interface PayloadContract
{
    public function toArray(): array;

    public static function fromArray(array $data): PayloadContract;
}
