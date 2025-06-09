<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogPostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Post::latest()->paginate(3);
        $data ?? [];
        return view('post.index', ['posts' => $data, 'pageTitle' => 'Blog Posts']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create', ['pageTitle' => 'Create New Post']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogPostRequest $request)
    {
        $post = new Post();

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->author = $request->input('author');
        $post->published = $request->boolean('published');

        $post->save();

        return redirect('/blog')->with('notification', [
            'type' => 'success',
            'message' => 'Post created successfully!'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect('/blog')->with('notification', [
                'type' => 'error',
                'message' => 'Post not found!'
            ]);
        }
        return view('post.show', ['post' => $post, 'pageTitle' => $post->title]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect('/blog')->with('notification', [
                'type' => 'error',
                'message' => 'Post not found!'
            ]);
        }
        return view('post.edit', ['pageTitle' => 'Edit Post', 'post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogPostRequest $request, string $id)
    {
        $post = Post::findOrFail($id);

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->author = $request->input('author');
        $post->published = $request->boolean('published');

        $post->save();

        return redirect("/blog/{$id}")->with('notification', [
            'type' => 'success',
            'message' => 'Post update successfully!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/blog')->with('notification', [
            'type' => 'success',
            'message' => 'Post delete successfully!'
        ]);
    }

    public function factoryCreate()
    {
        Post::factory()->count(500)->create();
        return redirect('/blog');
    }
}
