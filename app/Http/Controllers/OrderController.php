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
    public function index()
    {
        //
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
