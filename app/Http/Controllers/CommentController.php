<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Comment::paginate(5);
        $data ?? [];
        return view('comment.index', ['comments' => $data, 'pageTitle' => 'Post Comments']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comment.create', ['pageTitle' => 'Create Comment']);
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
        $comment = Comment::findOrFail($id);
        return view('comment.show', ['comment' => $comment, 'pageTitle' => $comment->author]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comment = Comment::findOrFail($id);
        return view('comment.edit', ['comment' => $comment, 'pageTitle' => 'Edit Comment']);
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
        Comment::factory(5)->create();
        return redirect('/comment');
    }
}
