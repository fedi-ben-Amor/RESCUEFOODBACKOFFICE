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
        ]);

        Food::create([
            'foodName' => $request->input('foodName'),
            'category_id' => $request->input('category_id'),
            'description' => $request->input('description'),
            'ingredients' => json_encode(explode(',', $request->input('ingredients'))), 
            'stockTotal' => $request->input('stockTotal'), // Prendre stockTotal depuis la requête
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
