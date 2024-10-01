<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class DeclarationController extends Controller
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
        // Récupérer toutes les déclarations de l'API Flask
        $response = Http::get('http://127.0.0.1:5000/api/declarations');

        if ($response->successful()) {
            $declarations = $response->json();
        } else {
            $declarations = [];
            session()->flash('error', 'Impossible de récupérer les déclarations pour le moment.');
        }

        return view('admin.declarations.index', compact('declarations'));
    }

    public function create()
    {
        return view('admin.declarations.create');
    }

    public function store(Request $request)
    {
        // Récupérer l'ID de l'utilisateur connecté
        $admin = Session::get('admin');
        $utilisateurId = $admin['utilisateurId']; // Assurez-vous que cela correspond à la structure de vos données

        // Valider les données d'entrée
        $validated = $request->validate([
            'nomProprio' => 'required|string|max:255',
            'prenomProprio' => 'required|string|max:255',
            'telephoneProprio' => 'required|string|max:15',
            'lieuLong' => 'required|numeric',
            'lieuLat' => 'required|numeric',
            'photoCarteGrise' => 'required|file|mimes:jpeg,png,jpg',
            'numChassis' => 'required|string|max:255',
            'numPlaque' => 'required|string|max:255',
            'marque' => 'required|string|max:255',
            'modele' => 'required|string|max:255',
            'dateHeure' => 'required|date',
            'statut' => 'required|string|max:255',
        ]);

        // Ajouter l'utilisateurId de l'utilisateur connecté aux données validées
        $validated['utilisateurId'] = $utilisateurId;

        // Encoder la photo en base64
        if ($request->hasFile('photoCarteGrise')) {
            $photoPath = $request->file('photoCarteGrise')->getRealPath();
            $validated['photoCarteGrise'] = base64_encode(file_get_contents($photoPath));
        }

        // Envoyer la requête POST à l'API Flask
        $response = Http::post('http://127.0.0.1:5000/api/declarations', $validated);

        if ($response->successful()) {
            return redirect()->route('admin.declarations.index')->with('success', 'Déclaration créée avec succès.');
        }

        return redirect()->back()->withErrors(['error' => 'Erreur lors de la création de la déclaration.']);
    }

    public function show($id)
    {
        // Récupérer les détails d'une déclaration spécifique
        $response = Http::get("http://127.0.0.1:5000/api/declarations/{$id}");

        if ($response->successful()) {
            $declaration = $response->json();
            return view('admin.declarations.show', compact('declaration'));
        }

        return redirect()->route('admin.declarations.index')->withErrors(['error' => 'Impossible de récupérer la déclaration.']);
    }

    public function edit($id)
    {
        // Récupérer les détails d'une déclaration à éditer
        $response = Http::get("http://127.0.0.1:5000/api/declarations/{$id}");

        if ($response->successful()) {
            $declaration = $response->json();
            return view('admin.declarations.edit', compact('declaration'));
        }

        return redirect()->route('admin.declarations.index')->withErrors(['error' => 'Impossible de récupérer la déclaration.']);
    }

    public function update(Request $request, $id)
    {
        // Valider les données d'entrée
        $validated = $request->validate([
            'nomProprio' => 'required|string|max:255',
            'prenomProprio' => 'required|string|max:255',
            'telephoneProprio' => 'required|string|max:15',
            'lieuLong' => 'required|numeric',
            'lieuLat' => 'required|numeric',
            'photoCarteGrise' => 'nullable|file|mimes:jpeg,png,jpg',
            'numChassis' => 'required|string|max:255',
            'numPlaque' => 'required|string|max:255',
            'marque' => 'required|string|max:255',
            'modele' => 'required|string|max:255',
            'dateHeure' => 'required|date|before_or_equal:today',
        ]);

        // Encoder la photo en base64 si fournie
        if ($request->hasFile('photoCarteGrise')) {
            $photoPath = $request->file('photoCarteGrise')->getRealPath();
            $validated['photoCarteGrise'] = base64_encode(file_get_contents($photoPath));
        }

        // Envoyer la requête PUT à l'API Flask
        $response = Http::put("http://127.0.0.1:5000/api/declarations/{$id}", $validated);

        if ($response->successful()) {
            return redirect()->route('admin.declarations.index')->with('success', 'Déclaration mise à jour avec succès.');
        }

        return redirect()->back()->withErrors(['error' => 'Erreur lors de la mise à jour de la déclaration.']);
    }

    public function destroy($id)
    {
        // Envoyer la requête DELETE à l'API Flask
        $response = Http::delete("http://127.0.0.1:5000/api/declarations/{$id}");

        if ($response->successful()) {
            return redirect()->route('admin.declarations.index')->with('success', 'Déclaration supprimée avec succès.');
        }

        return redirect()->back()->withErrors(['error' => 'Erreur lors de la suppression de la déclaration.']);
    }
}
