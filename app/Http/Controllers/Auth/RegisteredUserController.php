<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;

use App\Mail\WelcomeEmail;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate(

            [

                'name' => ['required', 'string', 'min:3', 'max:255'],

                'surname' => ['required', 'string', 'min:3', 'max:255'],

                'email' => ['required', 'email', 'unique:users,email'],

                'telephone' => [

                    'required',

                    'regex:/^\+\d{8,15}$/',

                    'unique:users,telephone'
                ],

                'adresse' => ['nullable', 'string', 'max:255'],

                'password' => [

                    'required',

                    'confirmed',

                    'min:12',

                    'regex:/[a-z]/',

                    'regex:/[A-Z]/',

                    'regex:/[0-9]/',

                    'regex:/[@$!%*#?&]/',
                ],
            ],

            [
                'name.required' => 'Le nom est obligatoire.',

                'surname.required' => 'Le prénom est obligatoire.',

                'email.required' => 'L’adresse email est obligatoire.',

                'email.email' => 'Veuillez fournir une adresse email valide.',

                'email.unique' => 'Cette adresse email existe déjà.',

                'telephone.required' => 'Le numéro de téléphone est obligatoire.',

                'telephone.regex' => 'Le numéro doit être au format international.',

                'telephone.unique' => 'Ce numéro de téléphone existe déjà.',

                'password.required' => 'Le mot de passe est obligatoire.',

                'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',

                'password.min' => 'Le mot de passe doit contenir au moins 12 caractères.',

                'password.regex' => 'Le mot de passe ne respecte pas les règles de sécurité.',
            ],

            [
                'name' => 'Nom',

                'surname' => 'Prénom',

                'email' => 'Adresse email',

                'telephone' => 'Numéro de téléphone',

                'adresse' => 'Adresse',

                'password' => 'Mot de passe',
            ]

        );

        $user = User::create([

            'name' => mb_convert_case($request->name, MB_CASE_TITLE, "UTF-8"),

            'surname' => mb_convert_case($request->surname, MB_CASE_TITLE, "UTF-8"),

            'email' => strtolower($request->email),

            'telephone' => $request->telephone,

            'adresse' => $request->adresse,

            'password' => Hash::make($request->password),

        ]);

        Mail::to($user->email)->send(new WelcomeEmail($user));

        event(new Registered($user));;

        return redirect()

            ->route('login')

            ->with('create', 'Compte créé avec succès. Veuillez vous connecter.');
    }
}
