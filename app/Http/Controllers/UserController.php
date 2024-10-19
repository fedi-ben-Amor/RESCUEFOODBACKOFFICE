<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Restaurent;
use Carbon\Carbon;
class UserController extends Controller
{
    public function dashboard()
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
    
        // Count of orders for today
        $ordersToday = Order::whereDate('created_at', Carbon::today())->count();
    
        // Count of agents and clients
        $Agent = User::where('role', 'agent')->count();
        $Client = User::where('role', 'client')->count();
    
        // Count of agents and clients created this week
        $AgentCountbyWeek = User::where('role', 'agent')
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->count();
            
        $ClientCountbyWeek = User::where('role', 'client')
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->count();
    
        // Count of orders for this week
        $ordersThisWeek = Order::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
        
        // Count of orders for this month
        $ordersThisMonth = Order::whereMonth('created_at', Carbon::now()->month)->count();
        
        // Total count of orders
        $totalOrders = Order::count();
        
        // Count of restaurants created this week
        $restaurantsThisWeek = Restaurent::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
        
        // Total count of restaurants
        $totalRestaurants = Restaurent::count();
        
        // Agents and restaurants created this week
        $AgentbyWeek = User::where('role', 'agent')
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->get();
            
        $RestaurantsByWeek = Restaurent::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();
    
        // Get order counts for the last 4 weeks
        $lastFourWeeksOrders = [];
        for ($i = 0; $i < 4; $i++) {
            $startDate = Carbon::now()->subWeeks($i + 1)->startOfWeek();
            $endDate = Carbon::now()->subWeeks($i)->endOfWeek();
            $lastFourWeeksOrders[] = Order::whereBetween('created_at', [$startDate, $endDate])->count();
        }
    
        return view('Dashboard-Admin.Dashboard', compact(
            'RestaurantsByWeek',
            'AgentbyWeek',
            'restaurantsThisWeek',
            'totalRestaurants',
            'AgentCountbyWeek',
            'ClientCountbyWeek',
            'ordersToday',
            'Client',
            'Agent',
            'ordersThisWeek',
            'ordersThisMonth',
            'totalOrders',
            'lastFourWeeksOrders' // Pass the last four weeks of orders to the view
        ));
    }
    
        public function index($role) 
        {
            $users = User::where('role', $role)->get();
            
            return view('Dashboard-Admin.UserList', compact('users', 'role'));
        }
        public function edit($id)
        {
            $user = User::findOrFail($id);
            return view('Dashboard-Admin.UserList', compact('user'));
        }
    
        // Mettre à jour un utilisateur
        public function update(Request $request, $id)
        {
            $user = User::findOrFail($id);
            $user->update($request->all());
            return redirect()->route('Dashboard-Admin.UserList')->with('success', 'Utilisateur mis à jour avec succès');
        }
    
        // Supprimer un utilisateur
        public function destroy($id)
        {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->back()->with('success', 'Utilisateur supprimé avec succès');
        }
}