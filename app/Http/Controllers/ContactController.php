<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactStatusUpdated;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Récupérer les paramètres de recherche et de filtre
        $search = $request->input('search');
        $status = $request->input('status');
    
        $contacts = Contact::query();
    
        // Appliquer le filtre de statut si nécessaire
        if ($status) {
            $contacts->where('status', $status);
        }
    
        // Appliquer la recherche sur le nom, l'email et le téléphone
        if ($search) {
            $contacts->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                      ->orWhere('email', 'like', "%$search%")
                      ->orWhere('phone', 'like', "%$search%");
            });
        }
    
        // Paginer les résultats et filtrer par statut 'approved' ou 'pending'
        $contacts = $contacts->whereIn('status', ['approved', 'pending'])
                             ->paginate(2); // Paginer avec 2 résultats par page
    
        return view('Dashboard-Admin.ContactList', compact('contacts'));
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
        // Validation des données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric|min:8',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Création du contact
        Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
   
        ]);

        // Redirection ou message de succès
        return redirect()->back()->with('success', 'Message envoyé avec succès.');
    }
    public function approve($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->status = 'approved';
        $contact->save();
    
        // Send email
        Mail::to($contact->email)->send(new ContactStatusUpdated($contact, 'approved'));
    
        return redirect()->back()->with('success', 'Contact approuvé avec succès.');
    }
    
    public function reject($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->status = 'rejected';
        $contact->save();
    
        // Send email
        Mail::to($contact->email)->send(new ContactStatusUpdated($contact, 'rejected'));
    
        return redirect()->back()->with('success', 'Contact rejeté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
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
