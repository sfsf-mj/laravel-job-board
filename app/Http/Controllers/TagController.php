<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tag::paginate(5);
        $data ?? [];
        return view('tag.index', ['tags' => $data, 'pageTitle' => 'Tags']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tag.create', ['pageTitle' => 'Create Tag']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // @todo: this will be completed in the forms section
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tag = Tag::findOrFail($id);
        return view('tag.show', ['tag' => $tag, 'pageTitle' => $tag->name]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tag = Tag::findOrFail($id);
        return view('tag.edit', ['tag' => $tag, 'pageTitle' => 'Edit Tag']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // @todo: this will be completed in the forms section
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // @todo: this will be completed in the forms section
    }

    public function factoryCreate(){
        Tag::factory(5)->create();
        return redirect('/tag');
    }

    public function testManyToMany()
    {
        $post = Post::first();

        $tag = Tag::first();

        $post->tags()->attach([$tag->id]); // Attach tags with IDs 1 and 8 to post id 15

        return redirect('/blog/' . $post->id);
    }
}
