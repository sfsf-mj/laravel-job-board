<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $data = Tag::all();
        return view('tag.index', ['tags' => $data, 'pageTitle' => 'Tags']);
    }

    public function create()
    {
        Tag::create([
            'title' => 'CSS',
        ]);
        return redirect('/tag');
    }

    public function delete($id)
    {
        Tag::destroy($id);
        return redirect('/tag');
    }

    // public function testManyToMany()
    // {
    //     $post15 = Post::find(15);
    //     $post16 = Post::find(16);

    //     $post15->tags()->attach([1, 8]); // Attach tags with IDs 1 and 8 to post id 15
    //     $post16->tags()->attach(1); // Attach tag with ID 1 to post id 16

    //     return response()->json([
    //         'message' => 'Tags attached successfully',
    //         'post15_tags' => $post15->tags,
    //         'post16_tags' => $post16->tags,
    //     ]);
    // }

    public function testManyToMany()
    {
        $post = Post::first();

        $tag = Tag::first();

        $post->tags()->attach([$tag->id]); // Attach tags with IDs 1 and 8 to post id 15

        return redirect('/blog/' . $post->id);
    }

    public function factoryCreate()
    {
        // Tag::factory(5)->create();
        
        $tags = ['HTML', 'CSS', 'JS', 'PHP'];

        foreach ($tags as $title) {
            Tag::factory()->create([
                'title' => $title,
            ]);
        }

        return redirect('/tag');
    }
}
