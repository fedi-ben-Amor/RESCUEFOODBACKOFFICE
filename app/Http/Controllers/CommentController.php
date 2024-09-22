<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Blog;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $blogId)
    {
        $request->validate(['content' => 'required|string|max:255']);

        Comment::create([
            'content' => $request->content,
            'blog_id' => $blogId,
            // 'user_id' => auth()->id(), // si tu utilises un système d'authentification
        ]);

        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    public function update(Request $request, $blogId, $commentId)
    {
        $request->validate(['content' => 'required|string|max:255']);

        $comment = Comment::findOrFail($commentId);
        $comment->update(['content' => $request->content]);

        return redirect()->back()->with('success', 'Comment updated successfully.');
    }

    public function destroy($blogId, $commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
