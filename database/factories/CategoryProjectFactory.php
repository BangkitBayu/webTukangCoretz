<?php

namespace Database\Factories;

use App\Models\CategoryProject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CategoryProject>
 */
class CategoryProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company()
        ];
    }
}
