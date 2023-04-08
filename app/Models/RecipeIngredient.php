<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeIngredient extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'recipe_id',
        'ingredient_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'recipe_id' => 'integer',
        'tag_id' => 'integer',
    ];

    /** 
     * Bleongs to recipe
     */
    public function recipe(): BelongsTo
    {   

       return $this->belongsTo(Recipe::class);
        
    }
}
