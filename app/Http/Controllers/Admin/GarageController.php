<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;


class GarageController extends Controller
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
        $response = Http::get('http://127.0.0.1:5000/api/garages');

        if ($response->successful()) {
            $garages = $response->json();
        } else {
            $garages = [];
            session()->flash('error', 'Impossible de récupérer les garages pour le moment.');
        }

        return view('admin.garages.index', compact('garages'));
    }

    public function create()
    {
        return view('admin.garages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateur|max:255',
            'adresse' => 'nullable|string',
            'telephone' => 'nullable|string|max:15',
            'motDePasse' => 'required|string|max:255',
            'nomGarage' => 'required|string|max:255',
            'adresseGarage' => 'required|string|max:255'
        ]);

        $response = Http::post('http://127.0.0.1:5000/api/garages', $validated);

        if ($response->successful()) {
            return redirect()->route('admin.garages.index')->with('success', 'Garage créé avec succès.');
        }

        return redirect()->back()->withErrors(['error' => 'Erreur lors de la création du garage.']);
    }

    public function edit($id)
    {
        $response = Http::get("http://127.0.0.1:5000/api/garages/{$id}");

        if ($response->successful()) {
            $garage = $response->json();
            return view('admin.garages.edit', compact('garage'));
        }

        return redirect()->route('admin.garages.index')->withErrors(['error' => 'Impossible de récupérer les détails du garage.']);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'adresse' => 'nullable|string',
            'telephone' => 'nullable|string|max:15',
            'nomGarage' => 'required|string|max:255',
            'adresseGarage' => 'required|string|max:255'
        ]);

        $response = Http::put("http://127.0.0.1:5000/api/garages/{$id}", $validated);

        if ($response->successful()) {
            return redirect()->route('admin.garages.index')->with('success', 'Garage mis à jour avec succès.');
        }

        return redirect()->back()->withErrors(['error' => 'Erreur lors de la mise à jour du garage.']);
    }

    public function destroy($id)
    {
        $response = Http::delete("http://127.0.0.1:5000/api/garages/{$id}");

        if ($response->successful()) {
            return redirect()->route('admin.garages.index')->with('success', 'Garage supprimé avec succès.');
        }

        return redirect()->back()->withErrors(['error' => 'Erreur lors de la suppression du garage.']);
    }

    public function show($id)
    {
        $response = Http::get("http://127.0.0.1:5000/api/garages/{$id}");

        if ($response->successful()) {
            $garage = $response->json();
            return view('admin.garages.show', compact('garage'));
        }

        return redirect()->route('admin.garages.index')->withErrors(['error' => 'Impossible de récupérer les détails du garage.']);
    }
}
