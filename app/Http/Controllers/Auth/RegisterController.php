<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showSignUpForm()
    {
        return view('auth.signup');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Validation des données d'inscription
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],
            'tel_fixe' => ['required', 'numeric'],
            'tel_mobile' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'picture' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
        ]);
        $path = $request->file('picture')->store('profile_pictures', 'public');
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'adresse' => $validatedData['adresse'],
            'tel_fixe' => $validatedData['tel_fixe'],
            'tel_mobile' => $validatedData['tel_mobile'],
            'role' => 'agent', 
            'password' => Hash::make($validatedData['password']),
            'picture' => $path,
        ]);
        return $user 
            ? redirect()->back()->with('success', 'Vous êtes maintenant enregistré avec succès.')
            : redirect()->back()->with('error', 'L\'enregistrement a échoué.');
    }
    
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerClient(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],
            'tel_mobile' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
           'picture' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],

        ]);
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->adresse = $validatedData['adresse'];
        $user->tel_mobile = $validatedData['tel_mobile'];
        $user->role = "client";
        $user->password = Hash::make($validatedData['password']);

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('profile_pictures', $filename, 'public'); 
            $user->picture = $path;
            $user->save();
        }
        if ($user->save()) {
            return redirect()->back()->with('success', 'Vous êtes maintenant enregistré avec succès.');
        } else {
            return redirect()->back()->with('error', 'L\'enregistrement a échoué.');
        }
    }
}
