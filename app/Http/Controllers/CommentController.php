<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;


class CommentController extends Controller
{
    //
    public function store(Request $request, $postId)
    {
        $request->validate(['content' => 'required']);

        $post = Post::findOrFail($postId);
        $post->comments()->create(['content' => $request->content]);

        return back();
    }

    // delete comment
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
