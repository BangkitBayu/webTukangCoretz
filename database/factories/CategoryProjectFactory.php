<?php

namespace Database\Factories;

use App\Models\CategoryProject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CategoryProject>
 */
class CategoryProjectFactory extends Factory
{
    protected $model = CategoryProject::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->words(2, true);
        return [
            'name' => ucwords($name)
        ];
    }
}
