<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tags') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-text-gray-900 dark:text-gray-100">
<div class="py-3 px-3">
<a href="{{ route('tag.create')}}">
<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
  New tag
</button>
</a>
</div>
@if (session()->has('message'))
<div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
  <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
  <p>{{ session('message') }}</p>
</div>
@endif
<table class="w-full table-fixed border">
  <thead>
    <tr>
      <th class="font-bold p-2 border-b text-left">Id</th>
      <th class="font-bold p-2 border-b text-left">Tag</th>
      <th class="font-bold p-2 border-b text-left">Actions</th>
    </tr>
  </thead>
  <tbody>
	@foreach($tags as $tag)
    <tr>
      <td>{{ $tag->id }}</td>
      <td>{{ $tag->tag}}</td>
      <td><a href="{{ route('tag.edit', ['id' => $tag->id]) }}"><button type="button" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button></a> &nbsp; <a href="{{ route('tag.destroy', ['id' => $tag->id]) }}" onClick="return(confirm('Really delete this tag?'))"><button type="button" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Delete</button></a></td>
    </tr>
	@endforeach
  </tbody>
</table>
	<div class="py-3 px-3">
		{{ $tags->links() }}
	</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
