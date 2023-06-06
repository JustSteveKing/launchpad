<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Resources\Json\JsonResource;
use JustSteveKing\Launchpad\Http\Responses\Concerns\HasResponse;
use Treblle\Tools\Http\Enums\Status;

final class ModelResponse implements Responsable
{
    use HasResponse;

    /**
     * @param JsonResource $data
     * @param Status $status
     */
    public function __construct(
        public readonly JsonResource $data,
        public readonly Status $status = Status::OK,
    ) {}
}
