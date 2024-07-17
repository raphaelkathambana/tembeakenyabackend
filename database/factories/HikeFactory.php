<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hike>
 */
class HikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $hikeNames = [
            'Kilimanjaro',
            'Mount Kenya',
            'Mount Elgon',
            'Aberdares',
            'Mau Forest',
            'Ngong Hills',
            'Hell\'s Gate',
            'Mount Longonot',
            'Mount Suswa',
            'Mount Marsabit',
            'Mount Kulal',
            'Mount Nyiru',
            'Mount Ololokwe',
            'Mount Elgon',
            'Mount Moroto',
            'Mount Kadam',
            'Mount Morungole',
            'Mount Otzi',
            'Mount Zulia',
            'Mount Morungole',
            'Mount Otzi',
            'Mount Zulia',
            'Mount Moroto',
            'Mount Kadam',
        ];
        return [
            'name' => fake()->randomElement($hikeNames),
            'distance' => fake()->randomFloat(2, 1, 10),
            'estimated_duration' => fake()->time(),
            'group_id' => fake()->randomElement([1,2,3]),
            'user_id' => fake()->randomDigitNotZero(),
            'waypoints' => json_encode(['waypoints' => 'data']),
        ];
    }
}
