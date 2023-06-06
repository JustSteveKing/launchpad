<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\Database;

use Closure;
use Illuminate\Database\DatabaseManager;
use Throwable;

final readonly class Portal
{
    /**
     * @param DatabaseManager $database
     */
    public function __construct(
        private DatabaseManager $database,
    ) {
    }

    /**
     * @param Closure $callback
     * @param int $attempts
     * @return mixed
     * @throws Throwable
     */
    public function transaction(Closure $callback, int $attempts = 2): mixed
    {
        return $this->database->transaction(
            callback: $callback,
            attempts: $attempts,
        );
    }
}
