<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $authUserRole = Auth::user()->role;

        $user = Auth::user();

        if (! $user->is_active) {

            Auth::logout(); 

            throw ValidationException::withMessages([

                'email' => 'Votre compte est désactivé. Veuillez contacter la quincaillerie kaoural.',

            ]);
        }

        if ($authUserRole == 0) {

            return redirect()->intended(route('superadmin.dashboard', absolute: false));

        } elseif ($authUserRole == 1) {

            return redirect()->intended(route('admin.dashboard', absolute: false));

        } else {

            return redirect()->intended(route('client.dashboard', absolute: false));

        }


    }

    /**
     * Destroy an authenticated session.
     */
        public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'vous avez épuisé votre session de connexion avec succès!');
    }
}
