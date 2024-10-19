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
{   $startOfWeek = Carbon::now()->startOfWeek();
    $endOfWeek = Carbon::now()->endOfWeek();
    $ordersToday = Order::whereDate('created_at', Carbon::today())->count();
    $Agent = User::where('role', 'agent')->count();
    $Client = User::where('role', 'client')->count();
    $AgentCountbyWeek = User::where('role', 'agent')
    ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
    ->count();
    $ClientCountbyWeek = User::where('role', 'client')
    ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
    ->count();
    // Commandes de cette semaine
    $ordersThisWeek = Order::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
    
    // Commandes de ce mois-ci
    $ordersThisMonth = Order::whereMonth('created_at', Carbon::now()->month)->count();
    
    // Commandes totales
    $totalOrders = Order::count();
    $restaurantsThisWeek = Restaurent::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
    $totalRestaurants = Restaurent::count();
    return view('Dashboard-Admin.Dashboard', compact('restaurantsThisWeek','totalRestaurants','AgentCountbyWeek','ClientCountbyWeek','ordersToday','Client','Agent', 'ordersThisWeek', 'ordersThisMonth', 'totalOrders'));
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