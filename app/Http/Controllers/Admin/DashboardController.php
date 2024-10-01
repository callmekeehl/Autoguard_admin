<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
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
        // Vérifiez si un admin est connecté
        if (!Session::has('admin')) {
            return redirect()->route('admin.login')->withErrors(['error' => 'Veuillez vous connecter pour accéder au tableau de bord.']);
        }

        // Récupération des statistiques depuis l'API Flask
        $response = Http::get('http://127.0.0.1:5000/api/dashboard/stats');

        // Vérifiez si la requête a réussi
        if ($response->successful()) {
            $stats = $response->json();
        } else {
            // Si la requête échoue, initialisez les compteurs à zéro
            $stats = [
                'utilisateurs' => 0,
                'polices' => 0,
                'garages' => 0,
                'declarations' => 0,
            ];
        }

        return view('admin.dashboard', [
            'utilisateursCount' => $stats['utilisateurs'],
            'policesCount' => $stats['polices'],
            'garagesCount' => $stats['garages'],
            'declarationsCount' => $stats['declarations'],
        ]);
    }

}
