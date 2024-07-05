<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Hike;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GroupHike>
 */
class GroupHikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'group_id' => fake()->randomDigitNotZero(),
            'hike_id' => fake()->randomDigitNotZero(),
            'guide_id' => fake()->randomDigitNotZero(),
            'hike_date' => fake()->dateTimeBetween('now', '+1 month'),
        ];
    }
}
