<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UtilisateurController;
use App\Http\Controllers\Admin\PoliceController;
use App\Http\Controllers\Admin\GarageController;
use App\Http\Controllers\Admin\DeclarationController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminAuth;

// Page d'accueil redirigeant vers la page de connexion ou le tableau de bord
Route::get('/', function () {
    return redirect()->route('admin.login');
});

// Routes pour l'authentification de l'administrateur
Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
});

// Routes protégées par l'authentification admin (middleware)
Route::prefix('admin')->middleware([AdminAuth::class])->group(function () {
    // Tableau de bord admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Routes pour la gestion des utilisateurs
    Route::get('/utilisateurs', [UtilisateurController::class, 'index'])->name('admin.utilisateurs.index');
    Route::get('/utilisateurs/create', [UtilisateurController::class, 'create'])->name('admin.utilisateurs.create');
    Route::post('/utilisateurs', [UtilisateurController::class, 'store'])->name('admin.utilisateurs.store');
    Route::get('/utilisateurs/{id}', [UtilisateurController::class, 'show'])->name('admin.utilisateurs.show');
    Route::get('/utilisateurs/{id}/edit', [UtilisateurController::class, 'edit'])->name('admin.utilisateurs.edit');
    Route::put('/utilisateurs/{id}', [UtilisateurController::class, 'update'])->name('admin.utilisateurs.update');
    Route::delete('/utilisateurs/{id}', [UtilisateurController::class, 'destroy'])->name('admin.utilisateurs.destroy');

    // Routes pour la gestion des polices
    Route::resource('polices', PoliceController::class, ['as' => 'admin']);

    // Routes pour la gestion des garages
    Route::resource('garages', GarageController::class, ['as' => 'admin']);

    // Routes pour la gestion des déclarations
    Route::resource('declarations', DeclarationController::class, ['as' => 'admin']);
});
