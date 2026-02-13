<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    // mon profil
    public function profil()
    {
        $user = Auth::user();

        return view('superadmin.interface.profil.profil', compact('user'));
    }

    // modifier mon profil

    public function updateProfil(Request $request)
    {
        $user = Auth::user();

     
        $request->validate([

            'prenom' => 'required|string|max:255',

            'nom' => 'required|string|max:255',

            'full_phone' => 'required', 

            'adresse' => 'required|string|max:255',
        ]);

        
        $user->update([

            'prenom' => $request->prenom,

            'nom' => $request->nom,

            'phone' => $request->full_phone,

            'adresse' => $request->adresse,
        ]);

       
        if ($request->filled('old_password')) {

            if (! Hash::check($request->old_password, $user->password)) {

                return back()->with('error', 'L\'ancien mot de passe est incorrect.');
            }

            $user->update([

                'password' => Hash::make($request->new_password),
            ]);
        }

        return redirect()->back()->with('success', 'Profil mis à jour avec succès !');
    }
}
