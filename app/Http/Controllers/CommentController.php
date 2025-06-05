<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $data = Comment::all();
        return view('comment.index', ['comments' => $data, 'pageTitle' => 'Post Comments']);
    }

    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        return view('comment.show', ['comment' => $comment, 'pageTitle' => $comment->author]);
    }

    public function create($id){
        Comment::create([
            'author' => 'MJ',
            'content' => 'comment content body',
            'post_id' => $id,
        ]);
        return redirect('/blog/'.$id);
    }

    public function factoryCreate(){
        Comment::factory(5)->create();
        return redirect('/blog');
    }
}
