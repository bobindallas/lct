<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ingredient;

class IngredientsTableSeeder extends Seeder {

		/**
		** Run the database seeds.
		**
		** @return void
		**/
    public function run() {

		 $ingredients = [
			 ['name' => 'Salt',          'notes' => 'Salty'],
			 ['name' => 'Pepper',        'notes' => 'Peppery'],
			 ['name' => 'Mayonnaise',    'notes' => 'Make a sandwich'],
			 ['name' => 'Mustard',       'notes' => 'For your hotdog'],
			 ['name' => 'Flour',         'notes' => 'For Baking'],
			 ['name' => 'Baking Powder', 'notes' => 'For Baking'],
			 ['name' => 'Parsley',       'notes' => 'Garnish'],
			 ['name' => 'Cumin',         'notes' => 'Spice'],
			 ['name' => 'Olive Oil',     'notes' => 'For Salad'],
			 ['name' => 'Cream Cheese',  'notes' => 'For your bagel'],
			 ['name' => 'Butter',        'notes' => 'For your Baked Potato'],
			 ['name' => 'Sugar',         'notes' => 'For everything'],
		 ];

		 foreach ($ingredients as $my_ingredient) {

			 $ingredient            = new Ingredient();
			 $ingredient->name      = $my_ingredient['name'];
			 $ingredient->notes     = $my_ingredient['notes'];
			 $ingredient->save();

		 }

    }
}
