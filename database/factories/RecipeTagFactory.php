<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\RecipeTag;

class RecipeTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RecipeTag::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'RecipeId' => $this->faker->numberBetween(-100000, 100000),
            'TagId' => $this->faker->numberBetween(-100000, 100000),
        ];
    }
}
