<?php

namespace App\Http\Controllers;

use App\Models\Food;
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
        // Load the associated Franchise and Food with each Stock
        $stocks = Stock::with(['franchise', 'food'])->paginate(5);
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
        $foods = Food::all(); // Retrieve all foods from the database

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
            'food_id' => 'required|integer|exists:food,id', // Ensure food_id exists in the foods table
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
        return redirect()->route('dashboard-agent.my-stock')->with('success', 'Stock created successfully.');
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
        $foods = Food::all(); // Retrieve all foods from the database

        return view('Dashboard-Agent.Stock.StockEdit', compact('stock', 'franchises', 'foods'));
    }


    public function show($id)
    {
        $stock = Stock::with('food', 'franchise')->findOrFail($id); // Load associated Food and Franchise

        return view('Dashboard-Agent.Stock.StockDetails', compact('stock'));
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
            'food_id' => 'required|integer|exists:food,id', // Validate food_id
            'quantity' => 'required|integer|min:1',
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

        return redirect()->route('dashboard-agent.my-stock')->with('success', 'Stock updated successfully.');
    }

    public function search(Request $request)
    {
        $query = Stock::with(['franchise', 'food']);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->whereHas('food', function ($q) use ($search) {
                $q->where('foodName', 'like', "%{$search}%");
            })->orWhereHas('franchise', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%");
            });
        }

        $stocks = $query->get();

        $franchiseColors = []; // Keep this array inside the view if you're using dynamic colors
        $colors = ['#FFFFCC', '#FFCC99', '#CCFFFF', '#FFCCCC', '#CCCCFF'];
        $colorIndex = 0;

        foreach ($stocks as $stock) {
            $franchise = $stock->franchise;
            if (!isset($franchiseColors[$franchise->id])) {
                $franchiseColors[$franchise->id] = $colors[$colorIndex % count($colors)];
                $colorIndex++;
            }
        }

        return response()->json([
            'html' => view('Dashboard-Agent.Stock.StockListPartial', compact('stocks', 'franchiseColors'))->render()
        ]);
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
