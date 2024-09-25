<?php

namespace App\Http\Controllers;

use App\Models\Franchise;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $stocks = Stock::with('franchise')->paginate(5); // Load the associated FranchiseUseless with each Stock
        return view('Dashboard-Agent.Stock.StockList', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $franchises = Franchise::all();

        // Static list of foods
        $foods = [
            ['id' => 1, 'name' => 'Pizza'],
            ['id' => 2, 'name' => 'Burger'],
            ['id' => 3, 'name' => 'Pasta'],
            ['id' => 4, 'name' => 'Salad'],
            ['id' => 5, 'name' => 'Sushi'],
        ];

        return view('Dashboard-Agent.Stock.StockCreate', compact('franchises', 'foods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'franchise_id' => 'required|integer|exists:franchises,id',
            'food_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
            'expiration_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the image upload
        $imageData = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageData = base64_encode(file_get_contents($image->path()));
        }

        // Create the stock
        Stock::create([
            'franchise_id' => $request->franchise_id,
            'food_id' => $request->food_id,
            'quantity' => $request->quantity,
            'expiration_date' => $request->expiration_date,
            'image_data' => $imageData,
        ]);

        // Redirect to the stock index with a success message
        return redirect()->route('dashboard-agent.my-stocks')->with('success', 'Stock created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $stock = Stock::findOrFail($id);
        $franchises = Franchise::all();

        // Static list of foods
        $foods = [
            ['id' => 1, 'name' => 'Pizza'],
            ['id' => 2, 'name' => 'Burger'],
            ['id' => 3, 'name' => 'Pasta'],
            ['id' => 4, 'name' => 'Salad'],
            ['id' => 5, 'name' => 'Sushi'],
        ];

        return view('Dashboard-Agent.Stock.StockEdit', compact('stock', 'franchises', 'foods'));
    }

    public function show($id)
    {
        $stock = Stock::findOrFail($id);

        // Static list of foods
        $foods = [
            1 => ['id' => 1, 'name' => 'Pizza'],
            2 => ['id' => 2, 'name' => 'Burger'],
            3 => ['id' => 3, 'name' => 'Pasta'],
            4 => ['id' => 4, 'name' => 'Salad'],
            5 => ['id' => 5, 'name' => 'Sushi'],
        ];

        return view('Dashboard-Agent.Stock.StockDetails', compact('stock', 'foods'));
    }


    public function updateImage(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $stock = Stock::findOrFail($id);

        // Handle the image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageData = base64_encode(file_get_contents($image->path()));
            $stock->image_data = $imageData;
            $stock->save();
        }

        return redirect()->route('stocks.show', $id)->with('success', 'Stock image updated successfully.');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'franchise_id' => 'required|integer|exists:franchises,id',
            'food_id' => 'required|integer',
            'quantity' => 'required|integer',
            'expiration_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $stock = Stock::findOrFail($id);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageData = base64_encode(file_get_contents($image->path()));
            $stock->image_data = $imageData;
        }

        // Update stock details
        $stock->update([
            'franchise_id' => $request->franchise_id,
            'food_id' => $request->food_id,
            'quantity' => $request->quantity,
            'expiration_date' => $request->expiration_date,
        ]);

        return redirect()->route('dashboard-agent.my-stocks')->with('success', 'Stock updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $stock = Stock::findOrFail($id);
        $stock->delete();

        return redirect()->route('dashboard-agent.my-stocks')->with('success', 'Stock deleted successfully.');
    }

    public function addStockQuantity($stockId, $quantityToAdd)
    {
        // Find the stock by ID
        $stock = Stock::findOrFail($stockId);

        // Add the quantity to the existing stock
        $stock->quantity += $quantityToAdd;

        // Save the updated stock
        $stock->save();

        return response()->json(['success' => true, 'message' => 'Stock quantity updated successfully.']);
    }

    public function retrieveStockQuantity($stockId, $quantityToRetrieve)
    {
        // Find the stock by ID
        $stock = Stock::findOrFail($stockId);

        // Check if the requested quantity is available
        if ($stock->quantity >= $quantityToRetrieve) {
            // Reduce the stock by the requested quantity
            $stock->quantity -= $quantityToRetrieve;

            // Save the updated stock
            $stock->save();

            return response()->json(['success' => true, 'message' => 'Stock quantity retrieved successfully.']);
        }

        // If the requested quantity is not available, return an error response
        return response()->json(['success' => false, 'message' => 'Not enough stock available.']);
    }





    public function retrieveAndUpdateStock($foodId, $franchiseName, $requestedQuantity)
    {
        $franchise = Franchise::where('name', $franchiseName)->first();

        if (!$franchise) {
            return false;
        }

        $stock = Stock::where('franchise_id', $franchise->id)
            ->where('food_id', $foodId)
            ->first();

        if (!$stock) {
            return false;
        }

        if ($stock->quantity >= $requestedQuantity) {
            $stock->quantity -= $requestedQuantity;
            $stock->save();

            return true;
        }

        return false;
    }

}
