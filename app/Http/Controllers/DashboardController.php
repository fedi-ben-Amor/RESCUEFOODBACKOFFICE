<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Food;
use App\Models\Stock;
use App\Models\Restaurent;
use App\Controller\FoodController;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Existing revenue calculations
        $totalRevenue = Order::sum('total_amount');
        $monthlyRevenue = Order::whereMonth('created_at', now()->month)->sum('total_amount');
        $stock = Stock::sum('quantity');
        // Get most available food items based on stock
        $mostSoldFoods = Food::with('stocks')
            ->get()
            ->map(function ($food) {
                return [
                    'foodName' => $food->foodName,
                    'total_sales' => $food->stocks->sum('quantity'), // This reflects total stock available, not sales
                ];
            })
            ->sortByDesc('total_sales')
            ->take(5);
            $ReviewTotal = Restaurent::with('reviews') // Use Restaurent he
            ->get()
            ->map(function ($restaurant) {
                $restaurant->average_rating = $restaurant->reviews->avg('rating') ?? 0; // Handle no reviews case
                return $restaurant;
            });

        return view('Dashboard-Agent.Dashboard', compact('ReviewTotal','stock','totalRevenue', 'monthlyRevenue', 'mostSoldFoods'));
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