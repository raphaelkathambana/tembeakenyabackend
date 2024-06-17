<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // create the role factory
            'roleName' => $this->faker->randomElement(['User', 'Admin', 'Super Admin']),
            'roleNo' => $this->faker->randomElement([1, 2, 3]),
        ];
    }
}
