<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipeStoreRequest;
use App\Http\Requests\RecipeUpdateRequest;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\RecipeIngredient;
use App\Models\RecipeTag;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RecipeController extends Controller
{
	public function index(Request $request): View
	{
		$recipes = Recipe::paginate(10);

		return view('recipe.index', compact('recipes'));
	}

	public function create(Request $request): View
	{
		 $ingredients = Ingredient::all();
		 $tags        = Tag::all();

		return view('recipe.create', compact('ingredients', 'tags'));
	}

	public function store(RecipeStoreRequest $request): RedirectResponse
	{

		$ingredients = $request->get('ingredients', []);
		$tags        = $request->get('tags', []);

		$recipe = Recipe::create($request->validated());

		// this should never acually do anything on a new record
		$this->clear_recipe_ingredients($recipe);
		$this->clear_recipe_tags($recipe);

		// save recipe ingredients and tags
		$this->load_recipe_ingredients($recipe, $ingredients);
		$this->load_recipe_tags($recipe, $tags);

		// send notification on new recipe save
		// $this->send_notification($recipe);

		$request->session()->flash('message', 'Recipe: ' . $recipe->name . ' successfully created.');

		return redirect()->route('recipe.index');
	}

	public function show(Request $request, Recipe $recipe): View
	{
		return view('recipe.show', compact('recipe'));
	}

	public function edit(Request $request, int $id): View
	{
		$recipe      = Recipe::with('recipe_ingredients', 'recipe_tags')->findOrFail($id);

		$recipe_ingredients = $recipe->recipe_ingredients->pluck('ingredient_id')->toArray();
		$recipe_tags        = $recipe->recipe_tags->pluck('tag_id')->toArray();

		$ingredients = Ingredient::all();
		$tags        = Tag::all();

		return view('recipe.edit', compact('recipe', 'ingredients', 'tags','recipe_ingredients', 'recipe_tags'));
	}

	public function update(RecipeUpdateRequest $request, int $id): RedirectResponse
	{

		$ingredients = $request->get('ingredients', []);
		$tags        = $request->get('tags', []);

		$recipe = Recipe::findOrFail($id);
		$recipe->update($request->validated());

		// clear old ingredients and tags
		$this->clear_recipe_ingredients($recipe);
		$this->clear_recipe_tags($recipe);

		// save recipe ingredients and tags
		$this->load_recipe_ingredients($recipe, $ingredients);
		$this->load_recipe_tags($recipe, $tags);
		
		$request->session()->flash('message', 'Recipe: '. $recipe->name . ' successfully updated.');

		return redirect()->route('recipe.index');
	}

	public function destroy(Request $request, int $id): RedirectResponse
	{
		$recipe = Recipe::findOrFail($id);
		$recipe->delete();

		// kill off the associated ingredients and tags
		$this->clear_recipe_ingredients($recipe);
		$this->clear_recipe_tags($recipe);

		$request->session()->flash('message', 'Recipe: ' . $recipe->name . ' successfully deleted.');

		return redirect()->route('recipe.index');
	}

	/**
	 * Send notification when new recipe is created
	 **/
	private function send_notification(Recipe $recipe) {

    $mail_details = [ 
		'title' => 'A new recipe has been created',
		'body'  => "Check it out: $recipe->name"
    ];  
   
    \Mail::to('bob@bobindallas.com')->send(new \App\Mail\MailSender($mail_details));
	
	}

	/**
	 * clear recipe ingredients
	 **/
	private function clear_recipe_ingredients(Recipe $recipe) {
	
		$del_ing = RecipeIngredient::where('recipe_id', $recipe->id)->delete();

	}

	/**
	 * clear recipe tags
	 **/
	private function clear_recipe_tags(Recipe $recipe) {
	
		$del_tag = RecipeTag::where('recipe_id', $recipe->id)->delete();
	}

	/**
	 * load recipe ingredients
	 **/
	private function load_recipe_ingredients(Recipe $recipe, array $ingredients) {
	
		foreach ($ingredients as $ingredient_id) {

			$new_recipe_ingredient = new RecipeIngredient;
			$new_recipe_ingredient->recipe_id     = $recipe->id;
			$new_recipe_ingredient->ingredient_id = $ingredient_id;
			$new_recipe_ingredient->save();
		
		}
	}

	/**
	 * load recipe ingredients
	 **/
	private function load_recipe_tags(Recipe $recipe, array $tags) {
	
		foreach ($tags as $tag_id) {

			$new_recipe_tag = new RecipeTag;
			$new_recipe_tag->recipe_id = $recipe->id;
			$new_recipe_tag->tag_id = $tag_id;
			$new_recipe_tag->save();
		
		}
	}
}
