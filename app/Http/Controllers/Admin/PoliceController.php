<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;


class PoliceController extends Controller
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
        $response = Http::get('http://127.0.0.1:5000/api/polices');

        // Vérifiez si la requête a réussi
        if ($response->successful()) {
            $polices = $response->json();
        } else {
            // Si la requête échoue, l'erreur est géré comme suit :
            $polices = [];
            // Message d'erreur
            session()->flash('error', 'Impossible de récupérer les polices pour le moment.');
        }

        return view('admin.polices.index', compact('polices'));
    }
    public function edit($id)
    {
        $response = Http::get("http://127.0.0.1:5000/api/polices/{$id}");
        $police = $response->json();

        return view('admin.polices.edit', compact('police'));
    }
    public function create()
    {
        return view('admin.polices.create');
    }

    public function store(Request $request)
    {

        // Valider les données d'entrée
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateur|max:255',
            'adresse' => 'nullable|string',
            'telephone' => 'nullable|string|max:15',
            'motDePasse' => 'required|string|max:255',
            'nomDepartement' => 'required|string|max:255',
            'adresseDepartement' => 'required|string|max:255'
        ]);

        // Envoyer la requête à l'API Flask
        $response = Http::post('http://127.0.0.1:5000/api/polices', $validated);

        if ($response->successful()) {
            return redirect()->route('admin.polices.index')->with('success', 'Police créé avec succès.');
        }

        return redirect()->back()->withErrors(['error' => 'Erreur lors de la création du compte police.']);
    }
    public function destroy($id)
    {
        $response = Http::delete("http://127.0.0.1:5000/api/polices/{$id}");

        if ($response->successful()) {
            return redirect()->route('admin.polices.index')->with('success', 'Police supprimé avec succès.');
        }

        return redirect()->back()->withErrors(['error' => 'Erreur lors de la suppression de l\'utilisateur.']);
    }
    public function show($id)
    {
        // Envoyer une requête GET à l'API Flask pour obtenir les détails d'un utilisateur
        $response = Http::get("http://127.0.0.1:5000/api/polices/{$id}");

        if ($response->successful()) {
            $police = $response->json();
            return view('admin.polices.show', compact('police'));
        }

        // En cas d'erreur, rediriger avec un message d'erreur
        return redirect()->route('admin.polices.index')->withErrors(['error' => 'Impossible de récupérer les détails de police.']);
    }
    public function update(Request $request, $id)
    {
        // Valider les données entrantes
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'adresse' => 'nullable|string',
            'telephone' => 'nullable|string|max:15',
            'nomDepartement' => 'required|string|max:255',
            'adresseDepartement' => 'required|string|max:255'
        ]);

        // Envoyer la requête PUT à l'API Flask
        $response = Http::put("http://127.0.0.1:5000/api/polices/{$id}", $validated);

        if ($response->successful()) {
            return redirect()->route('admin.polices.index')->with('success', 'Police mis à jour avec succès.');
        }

        return redirect()->back()->withErrors(['error' => 'Erreur lors de la mise à jour de police.']);
    }
}
