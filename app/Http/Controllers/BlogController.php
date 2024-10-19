<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Stichoza\GoogleTranslate\GoogleTranslate;
class BlogController extends Controller 
{
    public function index()
    {
        // Paginer uniquement les 3 premiers blogs
        $topBlogs = Blog::orderBy('created_at', 'desc')->simplePaginate(3);
    
        // Paginer les autres blogs après les 3 premiers
        $otherBlogs = Blog::orderBy('created_at', 'desc')->skip(3)->simplePaginate(6);
    
        return view('Frontoffice.Blogs.show', compact('topBlogs', 'otherBlogs'));
    }

    public function create()
    {
        return view('Frontoffice.Blogs.create'); 
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:150',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $userId = Auth::check() ? Auth::user()->id : null;
    
        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->user_id = $userId;
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('blog_images', $filename, 'public'); 
            $blog->image = $path; 
        }
    
        $blog->save(); 
    
        return redirect()->route('dashboard-agent.blogs')->with('success', 'Blog créé avec succès !'); 
    }
    
    public function show($id)
    {
        $blog = Blog::with('user')->findOrFail($id);
        return view('Frontoffice.Blogs.single', compact('blog'));
    }
    
    public function detail($id)
    {
        $blog = Blog::with('user')->findOrFail($id);
        return view('Dashboard-Agent.blogsDetail', compact('blog'));
    }
    
    public function agentBlogs()
    {
        $blogs = Blog::where('user_id', auth()->id())->get();
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
            'title' => 'required|string|max:150',
            'content' => 'required|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $blog = Blog::findOrFail($id);
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blogs', 'public');
            $blog->image = $imagePath;
        }

        $blog->save();

        return redirect()->route('dashboard-agent.blogs')->with('success', 'Blog modifié avec succès.');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('dashboard-agent.blogs')->with('success', 'Blog supprimé avec succès!');
    }
    public function translate(Request $request)
    {
        // Valider la demande
        $request->validate([
            'content' => 'required|string',
            'target' => 'required|string|max:5',
        ]);
    
        $content = $request->input('content');
        $targetLanguage = $request->input('target');
    
        try {
            $translator = new GoogleTranslate();
            $translatedText = $translator->setSource('auto')->setTarget($targetLanguage)->translate($content);
            return response()->json(['translatedText' => $translatedText]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur de traduction: ' . $e->getMessage()], 500);
        }
    }
    
}
