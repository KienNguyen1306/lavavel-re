<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required'
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'movie_id' => $request->movie_id,
            'content' => $request->content,
            'parent_id' => $request->parent_id,
            'likes' => 0
        ]);

        return back();
    }
    public function like($id)
    {
        $comment = Comment::findOrFail($id);

        $comment->increment('likes');

        return response()->json([
            'likes' => $comment->likes
        ]);
    }
}
