<x-app-layout>
	 <x-slot name="header">
		  <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
				<a class="underline hover:text-blue-700" href="{{ route('recipe.index') }}" title="Back Recipe Index">{{ __('Recipes') }}</a> &raquo; New
		  </h2>
	 </x-slot>

	 <div class="py-12">
		  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
					 <div class="p-6 text-gray-900 dark:text-gray-100">
		<form method="POST" action="{{route('recipe.store')}}">
			@csrf
			@method('POST')
		  <div>
				<label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recipe name*</label>
				<input type="text" id="name" name="name" value="{{ old('name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Recipe name">
@error('name')
	 <div class="alert alert-danger">{{ $message }}</div>
@enderror
		  </div>

	<div class="py-3">
	<label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description*</label>
	<textarea id="description" name="description" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Description...">{{ old('description') }}</textarea>
	@error('description')
		 <div class="alert alert-danger">{{ $message }}</div>
	@enderror
	</div>
	<div class="py-3">
	<label for="cooking_instructions" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cooking Instructions*</label>
	<textarea id="cooking_instructions" name="cooking_instructions" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cooking Instructions...">{{ old('cooking_instructions') }}</textarea>
	@error('cooking_instructions')
		 <div class="alert alert-danger">{{ $message }}</div>
	@enderror
	</div>
	<div class="py-3">
	<label for="notes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Notes*</label>
	<textarea id="notes" name="notes" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Notes...">{{ old('notes') }}</textarea>
	@error('notes')
		 <div class="alert alert-danger">{{ $message }}</div>
	@enderror
	</div>

	<div class="grid grid-cols-2 overflow-y-auto">
		<div class="px-3 py-3">
			<h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Ingredients</h3>
			<ul class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
				@foreach($ingredients as $ingredient)
			    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
			        <div class="flex items-center pl-3">
			            <input id="ingredients[{{ $ingredient->id }}]" name="ingredients[]" type="checkbox" value="{{ $ingredient->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
			            <label for="ingredients[{{ $ingredient->id }}]" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $ingredient->name }}</label>
			        </div>
			    </li>
				@endforeach
			
			</ul>
		</div>
		<div class="px-3 py-3">
			<h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Tags</h3>
			<ul class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
			@foreach($tags as $tag)
			    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
			        <div class="flex items-center pl-3">
			            <input id="tags[{{ $tag->id }}]" name="tags[]" type="checkbox" value="{{ $tag->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
			            <label for="tags[{{ $tag->id }}]" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $tag->tag }}</label>
			        </div>
			    </li>
			@endforeach
			
			</ul>
		</div>
	</div>

<button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
  Save
</button>
</form>

					 </div>
				</div>
		  </div>
	 </div>
</x-app-layout>

