<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Post;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = CommentResource::collection(Comments::all());
        return response()->json($comments);
    }

    public function create()
    {
        //
    }

    public function store(CommentRequest $request)
    {
        $validated = $request->validated();
        Comments::create([
            'comment' => $validated['comment'],
            'post_id' => $validated['post_id'],
            'user_id' => auth()->id()
        ]);
        return response()->json('comment add successfully');
    }

    public function show(Comments $comments)
    {
        //
    }

    public function edit(Comments $comments)
    {
        //
    }

    public function update(CommentRequest $request, Comments $comments)
    {
        $validated = $request->validated();
        $comments->update([
            'comment' => $validated['comment'],
            'post_id' => $comments->post_id,
            'user_id' => auth()->id(),
        ]);
        return response()->json('comment updated successfully');
    }

    public function destroy(Comments $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return response()->json('delete success');
    }
}


