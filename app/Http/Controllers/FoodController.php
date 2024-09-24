<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        // Pass the categories to the view that will display the form
        return view('Dashboard-Agent.foods.create', compact('categories'));
    }


        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listeOfFoodsByRestaurant()
    {
        // Retrieve all foods associated with a restaurant (you might need a where clause if specific to restaurant)
        $foods = Food::all();
    
        // Pass the $foods variable to the 'Dashboard-Agent.MyProducts' view
        return view('Dashboard-Agent.MyProducts', compact('foods'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'foodName' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'stockTotal' => 'required|integer|min:0',
            'BasePrice' => 'required|integer|min:0',
            'SellPrice' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $picturePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            // Store the image in 'storage/app/public/product_image'
            $picturePath = $file->storeAs('food_image', $filename, 'public');
        }
       
        Food::create([
            'foodName' => $request->input('foodName'),
            'category_id' => $request->input('category_id'),
            'description' => $request->input('description'),
            'ingredients' => json_encode(explode(',', $request->input('ingredients'))), 
            'stockTotal' => $request->input('stockTotal'), // Prendre stockTotal depuis la requête
            'BasePrice' => $request->input('BasePrice'), 
            'SellPrice' => $request->input('SellPrice'), 
            'image' => $picturePath, 
        ]);


        return redirect('/agent/dashboard/foods')->with('success', 'Food item created successfully.');
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
        $food = Food::findOrFail($id);  // Get the food item or fail if not found
        $categories = Category::all();
        // Pass the food data to a view for editing
        return view('Dashboard-Agent.Foods.update', compact('food','categories'));
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
        // Validate the incoming request data
        $request->validate([
            'foodName' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|integer|exists:categories,id',
            'ingredients' => 'nullable|string',
            'stockTotal' => 'required|integer|min:0',
            'BasePrice' => 'required|integer|min:0',
            'SellPrice' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Find the food item by ID
        $food = Food::findOrFail($id);
        $picturePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            // Store the image in 'storage/app/public/product_image'
            $picturePath = $file->storeAs('food_image', $filename, 'public');
            $food->image = $picturePath; 
        }
        // Update the food item's details
        $food->foodName = $request->input('foodName');
        $food->description = $request->input('description');
        $food->category_id = $request->input('category_id');
        $food->ingredients = json_encode(explode(',', $request->input('ingredients')));
        $food->stockTotal = $request->input('stockTotal');
        $food->BasePrice = $request->input('BasePrice'); 
        $food->SellPrice = $request->input('SellPrice');
      
        // Save the changes
        $food->save();
    
        // Redirect back to the list of foods with a success message
        return redirect()->route('dashboard-agent.my-products')->with('success', 'Food item updated successfully.');
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
