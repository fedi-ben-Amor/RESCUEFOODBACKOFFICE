<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

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
        // Valide et enregistre le nouveau blog
        $blog = Blog::create($request->all());
        
        return redirect()->route('Frontoffice.Blogs.index'); // Redirige vers la liste des blogs
    }
    
    public function show($id)
    {
        $blog = Blog::findOrFail($id); // Récupère le blog par ID ou lance une erreur 404
        return view('Frontoffice.Blogs.single', compact('blog')); // Utilisez une vue différente pour afficher le blog
    }
    
 
}
