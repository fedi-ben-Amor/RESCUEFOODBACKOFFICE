<?php

namespace App\Http\Controllers;
use App\Models\Restaurant;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();

        return view('Dashboard-Admin.Restaurants', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // Validate the incoming request
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:15',
                'cuisine_type' => 'required|string|max:255',
                'description' => 'nullable|string',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
            // Create a new restaurant instance with request data
            $restaurant = new Restaurant($request->all());
    
            // Handle logo upload if provided
            if ($request->hasFile('logo')) {
                $logoFile = $request->file('logo');
                $logoFilename = time() . '_logo.' . $logoFile->getClientOriginalExtension();
                $logoPath = $logoFile->storeAs('resto_logo', $logoFilename, 'public');
                $restaurant->logo = $logoPath; // Save the logo path to the restaurant model
            }
    
            // Handle picture upload if provided
            if ($request->hasFile('picture')) {
                $pictureFile = $request->file('picture');
                $pictureFilename = time() . '_picture.' . $pictureFile->getClientOriginalExtension();
                $picturePath = $pictureFile->storeAs('resto_picture', $pictureFilename, 'public');
                $restaurant->picture = $picturePath; // Save the picture path to the restaurant model
            }
    
            // Save the restaurant with the logo and picture paths
            $restaurant->save();
    
            // Redirect with success message
            return redirect()->route('resto.index')->with('success', 'Restaurant created successfully.');
        } catch (\Exception $e) {
            Log::error('Error creating restaurant: ' . $e->getMessage());
            return back()->withErrors(['error' => 'There was a problem creating the restaurant.']);
        }
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

    public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:Pending,Approved,Refused',
    ]);

    $restaurant = Restaurant::findOrFail($id);
    $restaurant->status = $request->status;
    $restaurant->save();

    return redirect()->back()->with('success', 'Status updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $restaurant = Restaurant::findOrFail($id);
            $restaurant->delete();
    
            return redirect()->route('restaurants.index')->with('success', 'Restaurant deleted successfully.');
        } catch (Exception $e) {
            Log::error('Error deleting restaurant: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete restaurant. Please try again.');
        }
    }
    

    
}
