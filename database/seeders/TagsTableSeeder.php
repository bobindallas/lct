<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;


class TagsTableSeeder extends Seeder {

	/**
	** Run the database seeds.
	**
	** @return void
	**/

    public function run(): void {

		 $tags = [
			 ['tag' => 'Breakfast'],
			 ['tag' => 'Lunch'],
			 ['tag' => 'Dinner'],
			 ['tag' => 'Brunch'],
			 ['tag' => 'Appetizer'],
			 ['tag' => 'Steak'],
			 ['tag' => 'Chicken'],
			 ['tag' => 'Italian'],
			 ['tag' => 'Asian'],
			 ['tag' => 'Gluten Free'],
			 ['tag' => 'Spicy'],
			 ['tag' => 'Late Night Snack'],
			 ['tag' => 'Dessert']
		 ];

		 foreach ($tags as $my_tag) {

			 $tag            = new tag();
			 $tag->tag      = $my_tag['tag'];
			 $tag->save();

		 }

    }
}
