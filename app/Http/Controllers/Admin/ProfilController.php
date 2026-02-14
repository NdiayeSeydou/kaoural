<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{

    public function profil()
    {
        $user = Auth::user();

        return view('admin.interface.profil.profil', compact('user'));
    }

  

public function updateProfil(Request $request)
{
    $user = Auth::user();

  
    if ($request->has('surname') || $request->has('name')) {

        $request->validate([
            'surname'   => ['required', 'string', 'min:3', 'max:255'],
            
            'name'      => ['required', 'string', 'min:3', 'max:255'],

            'telephone' => [

                'required',

                'regex:/^\+\d{8,15}$/',

                'unique:users,telephone,' . $user->id
            ],
            'adresse'   => ['required', 'string', 'max:255'],
        ], [

            'surname.required'   => 'Le prénom est obligatoire.',

            'surname.min'        => 'Le prénom doit contenir au moins 3 caractères.',

            'name.required'      => 'Le nom est obligatoire.',

            'name.min'           => 'Le nom doit contenir au moins 3 caractères.',

            'telephone.required' => 'Le numéro de téléphone est obligatoire.',

            'telephone.regex'    => 'Le numéro doit être au format international (ex: +223...).',

            'telephone.unique'   => 'Ce numéro de téléphone est déjà utilisé.',

            'adresse.required'   => 'L\'adresse est obligatoire.',
        ]);

        $user->update([

            'surname'   => mb_convert_case($request->surname, MB_CASE_TITLE, 'UTF-8'),

            'name'      => mb_convert_case($request->name, MB_CASE_TITLE, 'UTF-8'),

            'telephone' => $request->telephone,

            'adresse'   => $request->adresse,
        ]);

        return back()->with('profilupt', 'Profil mis à jour avec succès !');
    }

    if ($request->filled('old_password')) {

        $request->validate([

            'old_password' => ['required'],

            'new_password' => [

                'required',

                'confirmed',

                'min:12',

                'regex:/[a-z]/',

                'regex:/[A-Z]/',

                'regex:/[0-9]/',

                'regex:/[@$!%*#?&]/',
            ],
        ], [

            'old_password.required' => 'L\'ancien mot de passe est obligatoire.',

            'new_password.required' => 'Le nouveau mot de passe est obligatoire.',

            'new_password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',

            'new_password.min' => 'Le mot de passe doit contenir au moins 12 caractères.',

            'new_password.regex' =>
                'Le mot de passe doit contenir une majuscule, une minuscule, un chiffre et un caractère spécial.',
        ]);

        if (!Hash::check($request->old_password, $user->password)) {

            return back()->with('errorprofil', 'L\'ancien mot de passe est incorrect.');
        }

        $user->update([

            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('profilupt', 'Mot de passe mis à jour avec succès !');
    }

    return back();
}
    
}
