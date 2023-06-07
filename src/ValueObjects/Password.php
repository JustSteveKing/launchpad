<?php

declare(strict_types=1);

namespace JustSteveKing\Launchpad\ValueObjects;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password as PasswordValidation;
use JustSteveKing\Launchpad\ValueObjects\Concerns\HasStringValue;

final class Password
{
    use HasStringValue;

    public function validate(): bool
    {
        return Validator::make(
            data: [
                'password' => $this->value,
            ],
            rules: [
                'password' => [
                    'required',
                    PasswordValidation::default(),
                ]
            ]
        )->passes();
    }

    public function check(string $check): bool
    {
        return Hash::check(
            value: $this->value,
            hashedValue: $check,
        );
    }
}
