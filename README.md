# Launchpad

A helpful Laravel package to help me get started in Laravel projects quicker.

This is still a work in progress, so use at your own risk!

## CLI Commands

- `php artisan setup:phpstan`: This command will publish a default PHPStan configuration file in the root directory of your Laravel Project.
- `php artisan setup:pint`: This command will publish a default Laravel Pint configuration file in the root directory of your Laravel Project.

## Helpers

- `CacheService` - A helper to allow you to use caching underneath an abstracted class. Currently only implements:
  - `remember` which accepts:
    - `CacheKey` Enum
    - `CacheExpiry` Enum
    - `Closure` callback
- `Resolver` - A helper to allow you to fetch typed values from config.
- `Portal` - A helper to allow you to interact with the Laravel Database Manager, current methods implemented:
  - `transaction` which will allow you to do Database Transactions easily.
- `DispatchableCommandBus` - A helper to allow you to dispatch background jobs using the DI container instead of the Facade.

## Traits/Concerns

- `RendersInertiaComponent` - Add this to your Web Controllers, to have access to the underlying Response Factory for Inertia by using `$this->response->render()`.

## Contracts

- `SelfRegistersToContainer` - A contract that you can add to a class, which is used for self registration into the DI container for classes.
- `CacheExpiry` - A contract that we will add to Enums that are related to Cache Expiry times.
- `CacheKey` - A contract that we will add to Enums that are related to Cache Keys.

## API Responses

- `MessageResponse` - A response class that will return a response with the key `message`.
- `ModelResponse` - A response class that accepts an Eloquent Resource class.
- `CollectionResponse` - A response class that accepts an Eloquent Resource collection class.
