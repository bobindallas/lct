<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\IngredientController
 */
class IngredientControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $ingredients = Ingredient::factory()->count(3)->create();

        $response = $this->get(route('ingredient.index'));

        $response->assertOk();
        $response->assertViewIs('ingredient.index');
        $response->assertViewHas('ingredients');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('ingredient.create'));

        $response->assertOk();
        $response->assertViewIs('ingredient.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\IngredientController::class,
            'store',
            \App\Http\Requests\IngredientStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $name = $this->faker->name;
        $notes = $this->faker->text;

        $response = $this->post(route('ingredient.store'), [
            'name' => $name,
            'notes' => $notes,
        ]);

        $ingredients = Ingredient::query()
            ->where('name', $name)
            ->where('notes', $notes)
            ->get();
        $this->assertCount(1, $ingredients);
        $ingredient = $ingredients->first();

        $response->assertRedirect(route('ingredient.index'));
        $response->assertSessionHas('ingredient.id', $ingredient->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $ingredient = Ingredient::factory()->create();

        $response = $this->get(route('ingredient.show', $ingredient));

        $response->assertOk();
        $response->assertViewIs('ingredient.show');
        $response->assertViewHas('ingredient');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $ingredient = Ingredient::factory()->create();

        $response = $this->get(route('ingredient.edit', $ingredient));

        $response->assertOk();
        $response->assertViewIs('ingredient.edit');
        $response->assertViewHas('ingredient');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\IngredientController::class,
            'update',
            \App\Http\Requests\IngredientUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $ingredient = Ingredient::factory()->create();
        $name = $this->faker->name;
        $notes = $this->faker->text;

        $response = $this->put(route('ingredient.update', $ingredient), [
            'name' => $name,
            'notes' => $notes,
        ]);

        $ingredient->refresh();

        $response->assertRedirect(route('ingredient.index'));
        $response->assertSessionHas('ingredient.id', $ingredient->id);

        $this->assertEquals($name, $ingredient->name);
        $this->assertEquals($notes, $ingredient->notes);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $ingredient = Ingredient::factory()->create();

        $response = $this->delete(route('ingredient.destroy', $ingredient));

        $response->assertRedirect(route('ingredient.index'));

        $this->assertModelMissing($ingredient);
    }
}
