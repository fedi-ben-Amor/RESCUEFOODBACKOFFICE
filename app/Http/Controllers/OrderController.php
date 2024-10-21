<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Initialisation de la requête pour récupérer les commandes
        $query = Order::query();
        
        // Vérifier si l'utilisateur a fourni une recherche par `city` (ville)
        if ($request->has('city') && $request->city != null) {
            $query->where('city', 'like', '%' . $request->city . '%');
        }
        
        // Vérifier si l'utilisateur a fourni une recherche par `adresse`
        if ($request->has('address') && $request->address != null) {
            $query->where('address', 'like', '%' . $request->address . '%');
        }
        
        // Récupérer les commandes triées par `created_at` (décroissant) avec pagination
        $orders = $query->orderBy('created_at', 'desc')->paginate(3); // 10 résultats par page
        
        // Décoder le champ `cart` pour chaque commande
        foreach ($orders as $order) {
            $order->cart = json_decode($order->cart, true); // Décodage du JSON en tableau associatif
        }
        
        // Retourner la vue avec les commandes paginées
        return view('Dashboard-Agent.Orders', compact('orders'));
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
        // Validation des champs
        $request->validate([
            'total_amount' => 'required|numeric',
            'status' => 'required|string',
            'city' => 'required|string',
            'adresse' => 'required|string',
            'cart' => 'required|json', // Assurez-vous que le champ 'cart' est bien au format JSON
        ]);

        // Créer une nouvelle commande
        $order = new Order();
        $order->user_id = Auth::id();
        $order->total_amount = $request->input('total_amount');
        $order->status = $request->input('status');
        $order->city = $request->input('city');
        $order->adresse = $request->input('adresse');
        $order->cart = $request->input('cart'); // Enregistrer les données du panier

        $order->save();

 
    return redirect()->back()->with('succes', 'Commande ajoutée avec succès');
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
