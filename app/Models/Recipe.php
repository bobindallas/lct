<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'cooking_instructions',
        'notes',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

	 /**
	  * Has many recipe ingredients
	  */
	 public function recipe_ingredients()
	 {
		 return $this->hasMany(RecipeIngredient::class);
	 
	 }

	 /**
	  * Has many recipe ingredients
	  */
	 public function recipe_tags()
	 {
		 return $this->hasMany(RecipeTag::class);
	 
	 }
}
