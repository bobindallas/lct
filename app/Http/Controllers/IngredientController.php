<?php

namespace App\Http\Controllers;

use App\Http\Requests\IngredientStoreRequest;
use App\Http\Requests\IngredientUpdateRequest;
use App\Models\Ingredient;
use App\Models\RecipeIngredient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IngredientController extends Controller
{
    public function index(Request $request): View
    {
        $ingredients = Ingredient::paginate(10);

        return view('ingredient.index', compact('ingredients'));
    }

    public function create(Request $request): View
    {
        return view('ingredient.create');
    }

    public function store(IngredientStoreRequest $request): RedirectResponse
    {
        $ingredient = Ingredient::create($request->validated());

        $request->session()->flash('message', 'Ingredient: ' . $ingredient->name . ' successfully created.');

        return redirect()->route('ingredient.index');
    }

    public function show(Request $request, Ingredient $ingredient): View
    {
        return view('ingredient.show', compact('ingredient'));
    }

    public function edit(Request $request, int $id): View
    {
		 $ingredient = Ingredient::findOrFail($id);
        return view('ingredient.edit', compact('ingredient'));
    }

    public function update(IngredientUpdateRequest $request, int $id): RedirectResponse
    {
		 $ingredient = Ingredient::findOrFail($id);

        $ingredient->update($request->validated());

        $request->session()->flash('message', 'Ingredient: ' . $ingredient->name . ' successfully updated.');

        return redirect()->route('ingredient.index');
    }

    public function destroy(Request $request, int $id): RedirectResponse
    {

		 $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();

		 $this->clear_recipe_ingredients($ingredient);

        $request->session()->flash('message', 'Ingredient: ' . $ingredient->name . ' successfully deleted.');

        return redirect()->route('ingredient.index');
    }

   /** 
    * clear recipe ingredients - called from multiple functions
    **/
   private function clear_recipe_ingredients(Ingredient $ingredient) {
   
      $del_ing = RecipeIngredient::where('ingredient_id', $ingredient->id)->delete();

   }   

}
