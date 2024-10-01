<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // Valider les informations de connexion
        $validated = $request->validate([
            'email' => 'required|email',
            'motDePasse' => 'required|string|min:6',
        ]);

        // Envoyer une requête à l'API Flask pour vérifier les informations de connexion
        $response = Http::post('http://127.0.0.1:5000/api/login', $validated);

        if ($response->successful()) {
            $adminData = $response->json();

            // Vérifier le type d'utilisateur
            if ($adminData['user']['type'] !== 'admin') {
                return redirect()->back()->withErrors(['error' => 'Accès refusé : vous n\'êtes pas un administrateur.']);
            }

            // Stocker les informations de l'admin dans la session
            Session::put('admin', [
                'adminId' => $adminData['user']['adminId'], // Assurez-vous que ces clés existent
                'utilisateurId' => $adminData['user']['utilisateurId'],
            ]);

            return redirect()->route('admin.utilisateurs.index')->with('success', 'Connexion réussie.');
        }

        return redirect()->back()->withErrors(['error' => 'Email ou mot de passe incorrect.']);
    }


    public function logout()
    {
        // Supprimer les données de l'admin de la session
        Session::forget('admin');
        return redirect()->route('admin.login')->with('success', 'Déconnexion réussie.');
    }
}
