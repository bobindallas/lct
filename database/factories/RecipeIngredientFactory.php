<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\RecipeIngredient;

class RecipeIngredientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RecipeIngredient::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'RecipeId' => $this->faker->numberBetween(-100000, 100000),
            'IngredientId' => $this->faker->numberBetween(-100000, 100000),
        ];
    }
}
