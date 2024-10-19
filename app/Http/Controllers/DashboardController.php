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
    
        // Get all orders
        $orders = Order::whereYear('created_at', now()->year)
                       ->select('cart', 'created_at')
                       ->get();
    
        // Initialize arrays to hold sales data
        $foodSalesByMonth = [];
        $foodSalesOverall = []; // For overall sales
    
        // Loop through each order to aggregate sales
        foreach ($orders as $order) {
            $month = $order->created_at->format('m'); // Get month
            $foodIds = json_decode(json_decode($order->cart)->id); // Adjust this based on your JSON structure
            $quantities = json_decode(json_decode($order->cart)->quantity);
    
            // Aggregate sales by month and overall
            foreach ($foodIds as $index => $foodId) {
                // Monthly sales aggregation
                if (!isset($foodSalesByMonth[$month][$foodId])) {
                    $foodSalesByMonth[$month][$foodId] = 0;
                }
                $foodSalesByMonth[$month][$foodId] += $quantities[$index];
    
                // Overall sales aggregation
                if (!isset($foodSalesOverall[$foodId])) {
                    $foodSalesOverall[$foodId] = 0;
                }
                $foodSalesOverall[$foodId] += $quantities[$index];
            }
        }
    
        // Prepare data for the chart
        $chartData = [];
        $foodNames = [];
        $mostSoldFoods = []; // For most sold foods
    
        // Flatten the food sales for chart display and get most sold foods
        foreach ($foodSalesOverall as $foodId => $totalSales) {
            $food = Food::find($foodId);
            if ($food) {
                $mostSoldFoods[] = [
                    'foodName' => $food->foodName,
                    'total_sales' => $totalSales,
                ];
                $foodNames[] = $food->foodName;
            }
        }
    
        // Sort the most sold foods by total sales in descending order and take top 5
        usort($mostSoldFoods, function($a, $b) {
            return $b['total_sales'] <=> $a['total_sales'];
        });
        $mostSoldFoods = array_slice($mostSoldFoods, 0, 5); // Get top 5
    
        // Prepare data for the chart
        foreach ($foodSalesByMonth as $month => $foodSales) {
            foreach ($foodSales as $foodId => $totalSales) {
                $food = Food::find($foodId);
                if ($food) {
                    $chartData[] = [
                        'month' => now()->year . '-' . $month,
                        'foodName' => $food->foodName,
                        'total_sales' => $totalSales,
                    ];
                }
            }
        }
    
        return view('Dashboard-Agent.Dashboard', compact('totalRevenue', 'monthlyRevenue', 'chartData', 'foodNames', 'mostSoldFoods'));
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
