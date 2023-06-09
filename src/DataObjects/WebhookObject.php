<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\DataObjects;

final readonly class WebhookObject
{
    public function __construct(
        private string $event,
        private WebhookDataObject $data,
    ) {}

    public function toArray(): array
    {
        return [
            'event' => $this->event,
            'data' => $this->data->toArray(),
        ];
    }

    public static function fromArray(array $data): WebhookObject
    {
        return new WebhookObject(
            event: $data['event'],
            data: new WebhookDataObject(
                data: collect($data)->except('event')->toArray(),
            ),
        );
    }
}
