<?php

namespace App\Http\Controllers;

use App\Models\Franchise;
use Illuminate\Http\Request;

class FranchiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $franchises = Franchise::paginate(4); // Display 4 franchises per page
        return view('Dashboard-Agent.Franchise.Franchise', compact('franchises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('franchises.create');
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
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'manager_name' => 'required|string|max:255',
            'contact_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'restaurant_id' => 'required|integer', // Assuming default is set
        ]);

        // Create a new franchise
        Franchise::create($request->all());

        // Redirect to the franchise index with a success message
        return redirect()->route('franchises.index')->with('success', 'Franchise created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showPLS($id)
    {
        $franchise = Franchise::findOrFail($id);
        return view('Dashboard-Agent.Franchise.FranchiseShow', compact('franchise'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $franchise = Franchise::findOrFail($id);
        return view('Dashboard-Agent.Franchise.edit-franchise', compact('franchise'));
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
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'manager_name' => 'required|string|max:255',
            'contact_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image if present
        ]);

        // Find the franchise
        $franchise = Franchise::findOrFail($id);

        // Handle the image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageData = base64_encode(file_get_contents($image->path()));

            // Save the image data in the database
            $franchise->image_data = $imageData;
        }

        // Update the rest of the franchise details
        $franchise->update($request->except('image'));

        // Redirect back to the franchise detail page with a success message
        return redirect()->route('franchises.show', $franchise->id)->with('success', 'Franchise updated successfully.');
    }

    public function updateImage(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the franchise
        $franchise = Franchise::findOrFail($id);

        // Handle the image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageData = base64_encode(file_get_contents($image->path()));

            // Save the image data in the database
            $franchise->image_data = $imageData;
            $franchise->save();
        }

        // Redirect back with a success message
        return redirect()->route('franchises.show', $franchise->id)->with('success', 'Franchise image updated successfully.');
    }

    /**
     * Retrieve the specified franchise by its ID.
     *
     * @param int $id The ID of the franchise to retrieve.
     * @return \Illuminate\Http\JsonResponse The JSON response containing the franchise data.
     */
    public function getById($id)
    {
        // Find the franchise by ID
        $franchise = Franchise::findOrFail($id);

        // Return the franchise data as a JSON response
        return response()->json($franchise);
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $franchise = Franchise::findOrFail($id);
        $franchise->delete();

        return redirect()->route('franchises.index')->with('success', 'Franchise deleted successfully.');
    }
}