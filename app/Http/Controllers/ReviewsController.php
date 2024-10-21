<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use App\Models\Restaurent;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user(); 
        $resto = DB::table('restaurents')
            ->where('user_id', $user->id)
            ->get();
    
        // Pagination des reviews, par exemple 10 par page
        $reviews = Reviews::paginate(2); // Ajustez le nombre selon vos besoins
    
        return view('Dashboard-Agent.Reviews', compact('reviews', 'resto'));
    }
    


    public function indexUser()
{
    $reviews = Reviews::with('restaurent')->get(); // Eager load the restaurant relationship
    return view('FrontOffice.Reviews.MyReviews', compact('reviews'));
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
    public function store(Request $request, $restaurantId)
    {
        // Validate the incoming request
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string|max:1000',
        ]);
     
        // Create a new review
        $reviewData = [
            'restaurent_id' => $restaurantId,
            'comment' => $request->comment,
            'rating' => $request->rating,
            'date' => now()->format('Y-m-d'), // or however you want to format the date
        ];
        $reviewData['user_id'] = Auth::id();    
    

    
        Reviews::create($reviewData);
    
        // Redirect back to the restaurant details page with a success message
        return redirect()->back()->with('success', 'Review added successfully!');
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
        $review = Reviews::findOrFail($id);
        return view('FrontOffice.Reviews.edit', compact('review'));
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
    // Validate the incoming request
    $request->validate([
        'rating' => 'required|integer|between:1,5',
        'comment' => 'required|string|max:1000',
    ]);

    // Find the review by its ID
    $review = Reviews::findOrFail($id);

    // Update the review fields
    $review->comment = $request->comment;
    $review->rating = $request->rating;
    // Optionally update the date if you want to set it to the current date
    // $review->date = now()->format('Y-m-d'); 

    // Save the updated review
    $review->save();

    // Redirect back to the reviews page with a success message
    return redirect()->route('myreviews')->with('success', 'Review updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function destroy($id)
{
    // Find the review by its ID
    $review = Reviews::findOrFail($id);
    
    // Delete the review
    $review->delete();
    
    // Redirect back to the reviews page with a success message
    return redirect()->back()->with('success', 'Review deleted successfully!');
}
    
}
