<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

	// breeze routes
	Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

	// Laravel doesn't seem to like resource routes much these days - so we'll get specific
	Route::get('recipe.index', [App\Http\Controllers\RecipeController::class, 'index'])->name('recipe.index');
   Route::get('recipe/create', [App\Http\Controllers\RecipeController::class, 'create'])->name('recipe.create');
   Route::get('/recipe/edit/{id}', [App\Http\Controllers\RecipeController::class, 'edit'])->name('recipe.edit');
	Route::post('recipe.store', [App\Http\Controllers\RecipeController::class, 'store'])->name('recipe.store');
	Route::post('recipe/update/{id}', [App\Http\Controllers\RecipeController::class, 'update'])->name('recipe.update');
	Route::get('/recipe/destroy/{id}', [App\Http\Controllers\RecipeController::class, 'destroy'])->name('recipe.destroy');

	Route::get('ingredient.index', [App\Http\Controllers\IngredientController::class, 'index'])->name('ingredient.index');
   Route::get('ingredient/create', [App\Http\Controllers\IngredientController::class, 'create'])->name('ingredient.create');
   Route::get('/ingredient/edit/{id}', [App\Http\Controllers\IngredientController::class, 'edit'])->name('ingredient.edit');
	Route::post('ingredient.store', [App\Http\Controllers\IngredientController::class, 'store'])->name('ingredient.store');
	Route::post('ingredient/update/{id}', [App\Http\Controllers\IngredientController::class, 'update'])->name('ingredient.update');
	Route::get('/ingredient/destroy/{id}', [App\Http\Controllers\IngredientController::class, 'destroy'])->name('ingredient.destroy');

	Route::get('tag.index', [App\Http\Controllers\TagController::class, 'index'])->name('tag.index');
   Route::get('tag/create', [App\Http\Controllers\TagController::class, 'create'])->name('tag.create');
   Route::get('/tag/edit/{id}', [App\Http\Controllers\TagController::class, 'edit'])->name('tag.edit');
	Route::post('tag.store', [App\Http\Controllers\TagController::class, 'store'])->name('tag.store');
	Route::post('tag/update/{id}', [App\Http\Controllers\TagController::class, 'update'])->name('tag.update');
	Route::get('/tag/destroy/{id}', [App\Http\Controllers\TagController::class, 'destroy'])->name('tag.destroy');

});

require __DIR__.'/auth.php';

// Route::resource('recipe', App\Http\Controllers\RecipeController::class);
// Route::resource('ingredient', App\Http\Controllers\IngredientController::class);
// Route::resource('tag', App\Http\Controllers\TagController::class);
