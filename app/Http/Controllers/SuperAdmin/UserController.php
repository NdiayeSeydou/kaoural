<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    // listes des utilisateurs
    public function user()
    {

        $users = User::latest()->paginate(10);

        return view('superadmin.interface.user.listes', compact('users'));
    }

    // détails d'un utilisateur
    public function detailsUser($public_id)
    {

        $user = User::where('public_id', $public_id)->firstOrFail();

        return view('superadmin.interface.user.detailsUser', compact('user'));
    }

    // ajouter un utilisateur
    public function addUser()
    {
        return view('superadmin.interface.user.addUser');
    }

    public function storeUser(Request $request): RedirectResponse
    {
        $request->validate([

            'name' => ['required', 'string', 'min:3', 'max:255'],

            'surname' => ['required', 'string', 'min:3', 'max:255'],

            'email' => ['required', 'email', 'unique:users,email'],

            'telephone' => ['required', 'regex:/^\+\d{8,15}$/', 'unique:users,telephone'],

            'role' => ['required', 'in:superadmin,admin,client'],

            'adresse' => ['nullable', 'string', 'max:255'],

            'password' => [

                'required', 'confirmed', 'min:12',

                'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&]/',
            ],
        ], [

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

            'password.regex' => 'Le mot de passe doit contenir Majuscule, Minuscule, Chiffre et Caractère spécial.',
        ]);

        $roleMap = ['superadmin' => 0, 'admin' => 1, 'client' => 2];

        $user = User::create([

            'name' => mb_convert_case($request->name, MB_CASE_TITLE, 'UTF-8'),

            'surname' => mb_convert_case($request->surname, MB_CASE_TITLE, 'UTF-8'),

            'email' => strtolower($request->email),

            'telephone' => $request->telephone,

            'adresse' => $request->adresse,

            'role' => $roleMap[$request->role] ?? 2,

            'password' => Hash::make($request->password),
        ]);

        try {

            Mail::to($user->email)->send(new WelcomeEmail($user));

        } catch (\Exception $e) {

            Log::error('Erreur lors de l’envoi de l’email de bienvenue : '.$e->getMessage());

        }

        event(new Registered($user));

        return redirect()->route('superadmin.user.index')->with('useradd', 'Utilisateur créé avec succès.');
    }

    // modifier un utilisateur
    public function editUser($public_id)
    {
        $user = User::where('public_id', $public_id)->firstOrFail();

        return view('superadmin.interface.user.editUser', compact('user'));
    }

    public function updateUser(Request $request, $public_id): RedirectResponse
    {
        $user = User::where('public_id', $public_id)->firstOrFail();

        $request->validate([

            'name' => ['required', 'string', 'min:3'],

            'surname' => ['required', 'string', 'min:3'],

            'email' => ['required', 'email', 'unique:users,email,'.$user->id],

            'telephone' => [

                'required',

                'string',

                'max:20',

                'unique:users,telephone,'.$user->id],

            'role' => ['required', 'in:0,1,2'],

            'adresse' => ['nullable', 'string', 'max:255'],

            'password' => [

                'nullable',

                'confirmed',

                'min:12',

                'regex:/[a-z]/',

                'regex:/[A-Z]/',

                'regex:/[0-9]/',

                'regex:/[@$!%*#?&]/',
            ],
        ], [

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
        ]);

        $user->is_active = $request->has('is_active');

        $data = [

            'name' => mb_convert_case($request->name, MB_CASE_TITLE, 'UTF-8'),

            'surname' => mb_convert_case($request->surname, MB_CASE_TITLE, 'UTF-8'),

            'email' => strtolower($request->email),

            'telephone' => $request->telephone,

            'adresse' => $request->adresse,

            'role' => (int) $request->role,

            'is_active' => $request->has('is_active'),

        ];

        if ($request->filled('password')) {

            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('superadmin.user.index')->with('userupt', 'Utilisateur mis à jour.');
    }

    public function destroyUser($public_id): RedirectResponse
    {
        $user = User::where('public_id', $public_id)->firstOrFail();

        $user->delete();

        return redirect()->route('superadmin.user.index')->with('deleteuser', 'Utilisateur supprimé.');
    }

    // Activer ou Désactiver un utilisateur
    public function toggleStatus($public_id): RedirectResponse
    {
        $user = User::where('public_id', $public_id)->firstOrFail();

        if (auth()->check() && auth()->id() === $user->id) {

            return back()->with('errortoggle', 'Vous ne pouvez pas désactiver votre propre compte.');
        }

        $user->is_active = ! $user->is_active;

        $user->save();

        $status = $user->is_active ? 'activé' : 'désactivé';

        return back()->with('updatetoogle', "Le compte de {$user->name} a été {$status} avec succès.");
    }
}
