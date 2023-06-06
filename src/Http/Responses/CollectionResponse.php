<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use JustSteveKing\Launchpad\Http\Responses\Concerns\HasResponse;
use Treblle\Tools\Http\Enums\Status;

final class CollectionResponse implements Responsable
{
    use HasResponse;

    /**
     * @param AnonymousResourceCollection $data
     * @param Status $status
     */
    public function __construct(
        public readonly AnonymousResourceCollection $data,
        public readonly Status $status = Status::OK,
    ) {
    }
}
