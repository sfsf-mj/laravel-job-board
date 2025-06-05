<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::paginate(5);
        $data ?? [];
        return view('post.index', ['posts' => $data, 'pageTitle' => 'Blog Posts']);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post.show', ['post' => $post, 'pageTitle' => $post->title]);
    }

    public function create()
    {
        // Post::create([
        //     'title' => 'New Post',
        //     'body' => 'This is the body of the new post.',
        //     'author' => 'John Doe',
        //     'published' => true,
        // ]);

        Post::factory()->count(500)->create();

        return redirect('/blog');
    }

    public function delete($id)
    {
        Post::destroy($id);
        return redirect('/blog');
    }

    // public function delete(){
    //     Post::destroy(4);
    //     return redirect('/blog');
    // }

}
