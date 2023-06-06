<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\Queue;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\PendingDispatch;

final class DispatchableCommandBus
{
    /**
     * @param ShouldQueue $job
     * @return PendingDispatch
     */
    public function dispatch(ShouldQueue $job): PendingDispatch
    {
        return new PendingDispatch(
            job: $job,
        );
    }
}
