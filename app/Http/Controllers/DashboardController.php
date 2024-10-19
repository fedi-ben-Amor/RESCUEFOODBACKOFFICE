<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Food;
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
    
        // Get most sold food items per month
        $monthlySales = Order::whereMonth('created_at', now()->month)
            ->pluck('cart');
    
        // Initialize an array to hold sales data
        $foodSales = [];
    
        // Loop through each order to aggregate sales
        foreach ($monthlySales as $cart) {
            $items = json_decode($cart, true);
            foreach ($items as $item) {
                $foodId = $item['id'];
                $quantity = $item['quantity'];
    
                if (isset($foodSales[$foodId])) {
                    $foodSales[$foodId] += $quantity;
                } else {
                    $foodSales[$foodId] = $quantity;
                }
            }
        }
    
        // Get food names and sales totals
        $mostSoldFoods = Food::whereIn('id', array_keys($foodSales))
            ->get()
            ->map(function ($food) use ($foodSales) {
                return [
                    'foodName' => $food->foodName,
                    'total_sales' => $foodSales[$food->id],
                ];
            })
            ->sortByDesc('total_sales')
            ->take(5);
    
        // Prepare data for the chart
        $chartData = $mostSoldFoods->pluck('total_sales')->toArray();
        $foodNames = $mostSoldFoods->pluck('foodName')->toArray();
    
        return view('Dashboard-Agent.Dashboard', compact('totalRevenue', 'monthlyRevenue', 'mostSoldFoods', 'chartData', 'foodNames'));
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
