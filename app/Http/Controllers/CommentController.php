<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect('/blog')->with('notification', [
            'type' => 'info',
            'message' => 'Comments are not listed separately. Please visit a post to view its comments.'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect('/blog')->with('notification', [
            'type' => 'info',
            'message' => 'Comments are created on the post page. Please visit a post to add a comment.'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        $post = Post::find($request->input('post_id'));
        if (!$post) {
            return redirect('/blog')->with('notification', [
                'type' => 'error',
                'message' => 'Post not found!'
            ]);
        }

        $comment = new Comment();

        $comment->author = $request->input('author');
        $comment->content = $request->input('content');
        $comment->post_id = $request->input('post_id');

        $comment->save();

        return redirect("/blog/{$comment->post_id}")->with('notification', [
            'type' => 'success',
            'message' => 'Comment created successfully!'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect('/blog')->with('notification', [
            'type' => 'info',
            'message' => 'Comments are not displayed individually. Please visit a post to view its comments.'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comment = Comment::find($id);
        if (!$comment) {
            return redirect('/blog')->with('notification', [
                'type' => 'error',
                'message' => 'Comment not found!'
            ]);
        }

        return view('comment.edit', [
            'pageTitle' => 'Edit Comment',
            'comment' => $comment
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, string $id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            // هنا نستخدم معرف البوست من الفورم مباشرة بدلاً من $comment->post_id
            return redirect()->back()->with('notification', [
                'type' => 'error',
                'message' => 'Comment not found!'
            ]);
        }

        $post_id = $comment->post_id;

        $comment->author = $request->input('author');
        $comment->content = $request->input('content');

        $comment->save();

        return redirect("/blog/{$post_id}")->with('notification', [
            'type' => 'success',
            'message' => 'Comment updated successfully!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::find($id);
        $post_id = $comment->post_id;

        if (!$comment) {
            return redirect("/blog/{$post_id}")->with('notification', [
                'type' => 'error',
                'message' => 'Comment not found!'
            ]);
        }

        $comment->delete();
        return redirect("/blog/{$post_id}")->with('notification', [
            'type' => 'success',
            'message' => 'Comment deleted successfully!'
        ]);
    }

    public function factoryCreate()
    {
        Comment::factory(5)->create();
        return redirect('/comment');
    }
}
