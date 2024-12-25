<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class UtilisateurController extends Controller
{
    public function __construct()
    {
        // Vérifier la session admin avant chaque méthode
        if (!Session::has('admin')) {
            redirect()->route('admin.login')->send();
        }
    }
    public function index()
    {
        // Correction de l'URL : Supprimer le double "http://"
        $response = Http::get('http://127.0.0.1:5000/api/utilisateurs');

        // Vérifiez si la requête a réussi
        if ($response->successful()) {
            $utilisateurs = $response->json();
        } else {
            // Si la requête échoue, l'erreur est géré comme suit :
            $utilisateurs = [];
            // Message d'erreur
            session()->flash('error', 'Impossible de récupérer les utilisateurs pour le moment.');
        }

        return view('admin.utilisateurs.index', compact('utilisateurs'));
    }
    public function edit($id)
    {
        $response = Http::get("http://127.0.0.1:5000/api/utilisateurs/{$id}");
        $utilisateur = $response->json();

        return view('admin.utilisateurs.edit', compact('utilisateur'));
    }
    public function create()
    {
        return view('admin.utilisateurs.create');
    }

    public function store(Request $request)
    {
        // Valider les données d'entrée
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'adresse' => 'nullable|string',
            'telephone' => 'nullable|string|max:15',
            'motDePasse' => 'required|string|max:255',
        ]);

        // Envoyer la requête à l'API Flask
        $response = Http::post('http://127.0.0.1:5000/api/utilisateurs', $validated);

        if ($response->successful()) {
            return redirect()->route('admin.utilisateurs.index')->with('success', 'Utilisateur créé avec succès.');
        }

        return redirect()->back()->withErrors(['error' => 'Erreur lors de la création de l\'utilisateur.']);
    }
    public function destroy($id)
    {
        $response = Http::delete("http://127.0.0.1:5000/api/utilisateurs/{$id}");

        if ($response->successful()) {
            return redirect()->route('admin.utilisateurs.index')->with('success', 'Utilisateur supprimé avec succès.');
        }

        return redirect()->back()->withErrors(['error' => 'Erreur lors de la suppression de l\'utilisateur.']);
    }
    public function show($id)
    {
        // Envoyer une requête GET à l'API Flask pour obtenir les détails d'un utilisateur
        $response = Http::get("http://127.0.0.1:5000/api/utilisateurs/{$id}");

        if ($response->successful()) {
            $utilisateur = $response->json();
            return view('admin.utilisateurs.show', compact('utilisateur'));
        }

        // En cas d'erreur, rediriger avec un message d'erreur
        return redirect()->route('admin.utilisateurs.index')->withErrors(['error' => 'Impossible de récupérer les détails de l\'utilisateur.']);
    }
    public function update(Request $request, $id)
    {
        // Valider les données entrantes
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'adresse' => 'nullable|string',
            'telephone' => 'nullable|string|max:15'
        ]);

        // Envoyer la requête PUT à l'API Flask
        $response = Http::put("http://127.0.0.1:5000/api/utilisateurs/{$id}", $validated);

        if ($response->successful()) {
            return redirect()->route('admin.utilisateurs.index')->with('success', 'Utilisateur mis à jour avec succès.');
        }

        return redirect()->back()->withErrors(['error' => 'Erreur lors de la mise à jour de l\'utilisateur.']);
    }


}
