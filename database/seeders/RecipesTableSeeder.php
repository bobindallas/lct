<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recipe;

class RecipesTableSeeder extends Seeder {

	 /**
	 ** Run the database seeds.
	 **
	 ** @return void
	 **/
	    public function run() {

		 $recipes = [
			 ['name' => 'Hamburger',       'description' => 'Description', 'cooking_instructions' => 'Cooking Instructions',  'notes' => 'Notes'],
			 ['name' => 'Meatloaf',        'description' => 'Description', 'cooking_instructions' => 'Cooking Instructions',  'notes' => 'Notes'],
			 ['name' => 'Spaghetti',       'description' => 'Description', 'cooking_instructions' => 'Cooking Instructions',  'notes' => 'Notes'],
			 ['name' => 'Spaghetti',       'description' => 'Description', 'cooking_instructions' => 'Cooking Instructions',  'notes' => 'Notes'],
			 ['name' => 'Chili',           'description' => 'Description', 'cooking_instructions' => 'Cooking Instructions',  'notes' => 'Notes'],
			 ['name' => 'Denver Omelette', 'description' => 'Description', 'cooking_instructions' => 'Cooking Instructions',  'notes' => 'Notes'],
			 ['name' => 'Fried Chicken',   'description' => 'Description', 'cooking_instructions' => 'Cooking Instructions',  'notes' => 'Notes'],
			 ['name' => 'Steak',           'description' => 'Description', 'cooking_instructions' => 'Cooking Instructions',  'notes' => 'Notes'],
			 ['name' => 'Baked Potato',    'description' => 'Description', 'cooking_instructions' => 'Cooking Instructions',  'notes' => 'Notes'],
			 ['name' => 'French Fries',    'description' => 'Description', 'cooking_instructions' => 'Cooking Instructions',  'notes' => 'Notes'],
			 ['name' => 'Nachos',          'description' => 'Description', 'cooking_instructions' => 'Cooking Instructions',  'notes' => 'Notes'],
			 ['name' => 'Burrito',         'description' => 'Description', 'cooking_instructions' => 'Cooking Instructions',  'notes' => 'Notes'],
		 ];

		 foreach ($recipes as $my_recipe) {

			 $recipe                       = new Recipe();
			 $recipe->name                 = $my_recipe['name'];
			 $recipe->description          = $my_recipe['description'];
			 $recipe->cooking_instructions = $my_recipe['cooking_instructions'];
			 $recipe->notes                = $my_recipe['notes'];

			 $recipe->save();

		 }

    }
}
