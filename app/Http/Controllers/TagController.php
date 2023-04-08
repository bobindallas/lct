<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;
use App\Models\Tag;
use App\Models\RecipeTag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TagController extends Controller
{
    public function index(Request $request): View
    {
        $tags = Tag::all();

        return view('tag.index', compact('tags'));
    }

    public function create(Request $request): View
    {
        return view('tag.create');
    }

    public function store(TagStoreRequest $request): RedirectResponse
    {

        $tag = Tag::create($request->validated());

        $request->session()->flash('message', 'Tag: ' . $tag->tag . ' successfully created.');

        return redirect()->route('tag.index');
    }

    public function show(Request $request, Tag $tag): View
    {
        return view('tag.show', compact('tag'));
    }

    public function edit(Request $request, int $id): View
    {
		 $tag = Tag::findOrFail($id);
        return view('tag.edit', compact('tag'));
    }

    public function update(TagUpdateRequest $request, int $id): RedirectResponse
    {
		 $tag = Tag::findOrFail($id);
        $tag->update($request->validated());

        $request->session()->flash('message', 'Tag: ' . $tag->tag . ' successfully updated.');

        return redirect()->route('tag.index');
    }

    public function destroy(Request $request, int $id): RedirectResponse
    {
		 $tag = Tag::findOrFail($id);
        $tag->delete();

		 // clear tag from any existing recipes
		$this->clear_recipe_tags($tag);
        $request->session()->flash('message', 'Tag: ' . $tag->tag . ' successfully deleted.');

        return redirect()->route('tag.index');
    }

   /** 
    * clear recipe tags
    **/
   private function clear_recipe_tags(Tag $tag) {
   
      $del_tag = RecipeTag::where('tag_id', $tag->id)->delete();
   }
}
