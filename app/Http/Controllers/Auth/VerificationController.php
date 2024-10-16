<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
class VerificationController extends Controller
{
    use VerifiesEmails;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        // Only authenticated users can access the verification routes
        $this->middleware('auth');
        
        // Users need to be unverified to access certain routes
        $this->middleware('signed')->only('verify');
        
        // Throttle email resend attempts to prevent abuse
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    /**
     * Show the email verification notice.
     *
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
                    ? redirect($this->redirectPath())
                    : view('auth.verify');
    }

    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify(Request $request)
    {
        $user = $request->user();

        // If the user has already verified the email
        if ($user->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        // Verify the user's email
        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        return redirect($this->redirectPath())->with('verified', true);
    }

    /**
     * Resend the email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resend(Request $request)
    {
        // If the user's email is already verified
        if ($request->user()->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        // Send verification email
        $request->user()->sendEmailVerificationNotification();

        return back()->with('resent', true);
    }

    /**
     * Get the post verification redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        $user = Auth::user(); // Utilisez Auth pour obtenir l'utilisateur connecté

        // Vérifiez le rôle de l'utilisateur et redirigez en conséquence
        if ($user->role == 'admin') {
            return route('Dashboard'); // Redirige vers le Dashboard pour les admins
        } elseif ($user->role == 'agent') {
            return route('dashboard-agent'); // Redirige vers le dashboard des agents
        } elseif ($user->role == 'client') {
            return '/foodmarkets'; // Redirige vers la page des marchés alimentaires pour les clients
        }

        return '/'; // Redirection par défaut si aucun rôle ne correspond
    }
}
