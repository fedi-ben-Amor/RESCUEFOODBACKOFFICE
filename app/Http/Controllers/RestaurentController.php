<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurent;

class RestaurentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $restaurents = Restaurent::paginate(5); // Paginate the list of restaurants
        return view('Dashboard-Agent.Restaurant.index', compact('restaurents'));
    }


public function indexAdmin()
{
    $restaurants = Restaurent::paginate(10); // Changed $restaurents to $restaurants
    return view('Dashboard-Admin.Restaurants', compact('restaurants'));
}

public function frontView()
{
    // Call your function to get restaurants with average ratings
    $restaurants = $this->getRestaurantsWithAverageRating();
    
    return view('Frontoffice.foods.allmarkets', compact('restaurants'));
}

public function getRestaurantsWithAverageRating() {
    $restaurants = Restaurent::with('reviews') // Use Restaurent he
        ->get()
        ->map(function ($restaurant) {
            $restaurant->average_rating = $restaurant->reviews->avg('rating') ?? 0; // Handle no reviews case
            return $restaurant;
        });

    return $restaurants;
}

   
    public function search(Request $request)
    {
        $query = $request->input('query');

        $restaurents = Restaurent::when($query, function ($q) use ($query) {
            return $q->where('name', 'like', "%{$query}%")
                ->orWhere('cuisine_type', 'like', "%{$query}%")
                ->orWhere('city', 'like', "%{$query}%");
        })->get();

        return response()->json(['restaurents' => $restaurents]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('Dashboard-Agent.Restaurant.create');
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
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:15',
            'cuisine_type' => 'required|string|max:50',
            'description' => 'nullable|string',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('logo', 'picture');

        // Handle the logo upload
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoPath = $logo->storeAs('restoLogos', $logo->getClientOriginalName(), 'public'); // Store logo with original name in public/restoLogos
            $data['logo'] = $logoPath;
        }

        // Handle the picture upload
        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $picturePath = $picture->storeAs('restoPictures', $picture->getClientOriginalName(), 'public'); // Store picture with original name in public/restoPictures
            $data['picture'] = $picturePath;
        }

        Restaurent::create($data);

        return redirect()->route('restaurents.index')->with('success', 'Restaurant created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $restaurent = Restaurent::findOrFail($id);
        return view('Dashboard-Agent.Restaurant.show', compact('restaurent'));
    }

    public function showFront($id)
    {
        $restaurent = Restaurent::findOrFail($id);
        return view('Frontoffice.foods.detailsMarket', compact('restaurent'));
    }

    public function showAdmin($id)
    {
        $restaurent = Restaurent::findOrFail($id);
        return view('Dashboard-Admin.RestaurentDetails', compact('restaurent'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $restaurent = Restaurent::findOrFail($id);
        return view('Dashboard-Agent.Restaurant.edit', compact('restaurent'));
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
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:15',
            'cuisine_type' => 'required|string|max:50',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate logo if present
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate picture if present
        ]);

        $restaurent = Restaurent::findOrFail($id);

        $data = $request->except('logo', 'picture');

        // Handle the logo upload
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoPath = $logo->store('restoLogos', 'public'); // Store logo in public/restoLogos
            $data['logo'] = $logoPath;
        }

        // Handle the picture upload
        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $picturePath = $picture->store('restoPictures', 'public'); // Store picture in public/restoPictures
            $data['picture'] = $picturePath;
        }

        $restaurent->update($data);

        return redirect()->route('restaurents.show', $restaurent->id)->with('success', 'Restaurant updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $restaurent = Restaurent::findOrFail($id);
        $restaurent->delete();

        return redirect()->route('restaurents.index')->with('success', 'Restaurant deleted successfully.');
    }

    /**
     * Update the logo or picture of the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateImage(Request $request, $id)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $restaurent = Restaurent::findOrFail($id);

        // Handle the logo upload
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $restaurent->logo = base64_encode(file_get_contents($logo->path()));
        }

        // Handle the picture upload
        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $restaurent->picture = base64_encode(file_get_contents($picture->path()));
        }

        $restaurent->save();

        return redirect()->route('restaurents.show', $id)->with('success', 'Restaurant image updated successfully.');
    }
    public function updateStatus(Request $request, $id)
    {
        $restaurant = Restaurent::findOrFail($id);
        $restaurant->update([
            'status' => $request->input('status'),
        ]);
    
        return redirect()->back()->with('success', 'Status updated successfully!');
    }

 
    

}