<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a class="underline hover:text-blue-700" href="{{ route('ingredient.index') }}" title="Back to Ingredient index">{{ __('Ingredients') }}</a> &raquo; New
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
		<form method="POST" action="{{route('ingredient.store')}}">
			@csrf
			@method('POST')
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ingredient name*</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ingredient name">
@error('name')
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
<button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
  Save
</button>
</form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

