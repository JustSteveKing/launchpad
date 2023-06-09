<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\DataObjects;

final readonly class WebhookDataObject
{
    public function __construct(
        private array $data,
    ) {}

    public function toArray(): array
    {
        return $this->data;
    }
}
