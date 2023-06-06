<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use JustSteveKing\Launchpad\Http\Responses\Concerns\HasResponse;
use Treblle\Tools\Http\Enums\Status;

final class MessageResponse implements Responsable
{
    use HasResponse;

    /**
     * @param array{message:string} $data
     * @param Status $status
     */
    public function __construct(
        public readonly array $data,
        public readonly Status $status = Status::OK,
    ) {
    }
}
