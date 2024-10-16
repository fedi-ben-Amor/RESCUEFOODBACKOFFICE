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
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showSignUpForm()
    {
        return view('auth.signup');
    }

    public function register(Request $request)
    {
        // Validate registration data
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],
            'tel_fixe' => ['required', 'numeric'],
            'tel_mobile' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'picture' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
        ]);

        // Store profile picture
        $path = $request->file('picture')->store('profile_pictures', 'public');

        // Create user
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

        // Send verification email
        $user->sendEmailVerificationNotification();

        return redirect()->back()->with('success', 'Registration successful. Please check your email to verify your account.');
    }

    public function registerClient(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],
            'tel_mobile' => ['required', 'numeric', 'min:8', 'max:8'],
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
        }

        // Save user and send verification email
        if ($user->save()) {
            $user->sendEmailVerificationNotification(); // Send email verification
            return redirect()->back()->with('success', 'Registration successful. Please check your email to verify your account.');
        } else {
            return redirect()->back()->with('error', 'Registration failed.');
        }
    }
}
