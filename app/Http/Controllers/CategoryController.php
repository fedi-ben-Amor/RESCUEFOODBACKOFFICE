<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    // Fetch all categories from the database
    $categories = Category::all();

    // Pass the categories to the view
    return  view('Dashboard-Admin.Category', compact('categories'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            // Validate form inputs
            $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:categories,slug',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                       ]);
    
     
    
            // Handle 'picture' upload if provided
            $picturePath = null;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
    
                // Store the image in 'storage/app/public/product_image'
                $picturePath = $file->storeAs('product_image', $filename, 'public');
            }
    
            // Create the category with the uploaded image and picture (if any)
            Category::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'nbFood' => 0,
                'image' => $picturePath, // Store the picture path in the database
            ]);
    
            // Success message and redirect
            return redirect()->route('categories.liste')->with('success', 'Category created successfully.');
    
        } catch (Exception $e) {
            // Log the error for debugging
            Log::error('Error creating category: ' . $e->getMessage());
    
            // Optionally, you can also show a user-friendly error message
            return redirect()->back()->with('error', 'Failed to create category. Please try again.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
