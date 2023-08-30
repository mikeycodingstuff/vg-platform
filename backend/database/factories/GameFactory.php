<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(random_int(1, 3), true),
            'release_date' => fake()->boolean(90) ? fake()->date() : null,
            'developer' => fake()->boolean(90) ? fake()->company() : null,
            'description' => fake()->boolean(60) ? fake()->paragraph() : null,
        ];
    }
}
