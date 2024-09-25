<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    public function store(Request $request, $blogId)
    {
        // Vérifier si l'utilisateur est authentifié
        if (!auth()->check()) {
            return redirect()->back()->withErrors('Vous devez être connecté pour commenter.');
        }

        // Validation des données
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        // Créer le commentaire
        Comment::create([
            'content' => $request->content,
            'blog_id' => $blogId, // Utilisation de l'ID du blog passé dans la route
            'user_id' => auth()->id(), 
        ]);

        return redirect()->back()->with('success', 'Commentaire ajouté avec succès.');
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

