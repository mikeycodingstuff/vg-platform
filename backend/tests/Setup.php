<?php

namespace Tests;

use App\Models\User;
use Closure;

use function Pest\Laravel\actingAs;

final class Setup
{
    public static function createAndActAsUser(): Closure
    {
        return function (): void {
            $user = User::factory()->create();
            actingAs($user);
        };
    }
}

