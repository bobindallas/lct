<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\RecipeController
 */
class RecipeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $recipes = Recipe::factory()->count(3)->create();

        $response = $this->get(route('recipe.index'));

        $response->assertOk();
        $response->assertViewIs('recipe.index');
        $response->assertViewHas('recipes');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('recipe.create'));

        $response->assertOk();
        $response->assertViewIs('recipe.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RecipeController::class,
            'store',
            \App\Http\Requests\RecipeStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $name = $this->faker->name;
        $description = $this->faker->text;
        $cooking_instructions = $this->faker->text;
        $notes = $this->faker->text;

        $response = $this->post(route('recipe.store'), [
            'name' => $name,
            'description' => $description,
            'cooking_instructions' => $cooking_instructions,
            'notes' => $notes,
        ]);

        $recipes = Recipe::query()
            ->where('name', $name)
            ->where('description', $description)
            ->where('cooking_instructions', $cooking_instructions)
            ->where('notes', $notes)
            ->get();
        $this->assertCount(1, $recipes);
        $recipe = $recipes->first();

        $response->assertRedirect(route('recipe.index'));
        $response->assertSessionHas('recipe.id', $recipe->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $recipe = Recipe::factory()->create();

        $response = $this->get(route('recipe.show', $recipe));

        $response->assertOk();
        $response->assertViewIs('recipe.show');
        $response->assertViewHas('recipe');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $recipe = Recipe::factory()->create();

        $response = $this->get(route('recipe.edit', $recipe));

        $response->assertOk();
        $response->assertViewIs('recipe.edit');
        $response->assertViewHas('recipe');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RecipeController::class,
            'update',
            \App\Http\Requests\RecipeUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $recipe = Recipe::factory()->create();
        $name = $this->faker->name;
        $description = $this->faker->text;
        $cooking_instructions = $this->faker->text;
        $notes = $this->faker->text;

        $response = $this->put(route('recipe.update', $recipe), [
            'name' => $name,
            'description' => $description,
            'cooking_instructions' => $cooking_instructions,
            'notes' => $notes,
        ]);

        $recipe->refresh();

        $response->assertRedirect(route('recipe.index'));
        $response->assertSessionHas('recipe.id', $recipe->id);

        $this->assertEquals($name, $recipe->name);
        $this->assertEquals($description, $recipe->description);
        $this->assertEquals($cooking_instructions, $recipe->cooking_instructions);
        $this->assertEquals($notes, $recipe->notes);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $recipe = Recipe::factory()->create();

        $response = $this->delete(route('recipe.destroy', $recipe));

        $response->assertRedirect(route('recipe.index'));

        $this->assertModelMissing($recipe);
    }
}
