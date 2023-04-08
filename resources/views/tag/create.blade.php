<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a class="underline hover:text-blue-700" href="{{ route('tag.index') }}" title="Back to Tag index">{{ __('Tags') }}</a> >> New
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
		<form method="POST" action="{{route('tag.store')}}">
			@csrf
			@method('POST')
        <div>
            <label for="tag" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tag name*</label>
            <input type="text" id="tag" name="tag" value="{{ old('tag') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="tag name">
            @error('tag')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

			<div class="py-3">
			<button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
			  Save
			</button>
			</div>
			</form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

