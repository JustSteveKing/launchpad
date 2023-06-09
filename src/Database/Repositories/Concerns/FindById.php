<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\Database\Repositories\Concerns;

use JustSteveKing\Launchpad\Database\Contracts\EloquentEntity;
use JustSteveKing\Launchpad\ValueObjects\EntityID;

trait FindById
{
    public function find(EntityID $id): EloquentEntity
    {
        //
    }
}
