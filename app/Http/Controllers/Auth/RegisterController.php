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
            'tel_fixe' => ['required', 'integer'],
            'tel_mobile' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
           'picture' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],

        ]);

        // Création de l'utilisateur
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->adresse = $validatedData['adresse'];
        $user->tel_fixe = $validatedData['tel_fixe'];
        $user->tel_mobile = $validatedData['tel_mobile'];
        $user->role = "agent"; // Si vous avez un rôle par défaut
        $user->password = Hash::make($validatedData['password']);

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            
            // Stocker l'image dans 'storage/app/public/profile_pictures'
            $path = $file->storeAs('profile_pictures', $filename, 'public');
        
            // Stocker uniquement le chemin relatif dans la base de données (ex: 'profile_pictures/1727011877.png')
            $user->picture = $path;
            $user->save();
        }
        
        
    
        // Sauvegarde de l'utilisateur
        if ($user->save()) {
            return redirect()->back()->with('success', 'Vous êtes maintenant enregistré avec succès.');
        } else {
            return redirect()->back()->with('error', 'L\'enregistrement a échoué.');
        }
    }
}
