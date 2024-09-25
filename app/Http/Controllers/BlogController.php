<?php

namespace App\Http\Controllers;


use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        // Paginer uniquement les 3 premiers blogs
        $topBlogs = Blog::orderBy('created_at', 'desc')->simplePaginate(3);
    
        // Paginer les autres blogs après les 3 premiers
        $otherBlogs = Blog::orderBy('created_at', 'desc')->skip(3)->simplePaginate(6); // Nombre de blogs à paginer (6 ici)
    
        return view('Frontoffice.Blogs.show', compact('topBlogs', 'otherBlogs'));
    }
    
    
    
    
    

    public function create()
    {
        return view('Frontoffice.Blogs.create'); // Retourne la vue pour créer un blog
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if (Auth::check()) {
            $userId = Auth::user()->id; 
        } else {
            $userId = null; 
        }
    
    
        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->user_id = $userId;
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('blog_images', $filename, 'public'); 
            $blog->image = $path; // Chemin de l'image stockée
        }
    
        $blog->save(); 
    
        return redirect()->route('dashboard-agent.blogs')->with('success', 'Blog créé avec succès !'); // Rediriger avec un message de succès
    }
    
    
    
    
    
    
    
    public function show($id)
    {
        $blog = Blog::with('user')->findOrFail($id); // Charger l'utilisateur avec le blog
        return view('Frontoffice.Blogs.single', compact('blog'));  // Utilisez une vue différente pour afficher le blog
    }
    public function agentBlogs()
{
    // Récupérer les blogs de l'agent connecté
    $blogs = Blog::where('user_id', auth()->id())->get();

    // Retourner la vue avec la liste des blogs
    return view('Dashboard-Agent.blogs', compact('blogs'));
}

public function edit($id)
{
    $blog = Blog::findOrFail($id);
    return view('Frontoffice.Blogs.edit', compact('blog'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $blog = Blog::findOrFail($id);
    $blog->title = $request->input('title');
    $blog->content = $request->input('content');

    if ($request->hasFile('image')) {
        // Handle the image upload
        $imagePath = $request->file('image')->store('blogs', 'public');
        $blog->image = $imagePath;
    }

    $blog->save();

    return redirect()->route('Frontoffice.Blogs.index')->with('success', 'Blog modifié avec succès.');
}
public function destroy($id)
{
    $blog = Blog::findOrFail($id); // Find the blog by ID
    // Optionally delete the image from storage
    
    $blog->delete(); // Delete the blog

    return redirect()->route('Frontoffice.Blogs.index')->with('success', 'Blog supprimé avec succès!');
}

}
