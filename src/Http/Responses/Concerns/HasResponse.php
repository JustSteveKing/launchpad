<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\Http\Responses\Concerns;

use Illuminate\Http\JsonResponse;
use Treblle\Tools\Http\Enums\Status;

/**
 * @property-read mixed $data
 * @property-read Status $status
 */
trait HasResponse
{
    public function toResponse($request): JsonResponse
    {
        return new JsonResponse(
            data: $this->data,
            status: $this->status->value,
        );
    }
}
