@extends('layouts.admin')

@section('content')
    <h1>Créer un Nouveau Garage</h1>

    <form action="{{ route('admin.garages.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" class="form-control">
        </div>

        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" class="form-control">
        </div>

        <div class="form-group">
            <label for="mot_de_passe">Mot de Passe</label>
            <input type="password" name="motDePasse" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="nomGarage">Nom Garage</label>
            <input type="text" name="nomGarage" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="adresseGarage">Adresse Garage</label>
            <input type="text" name="adresseGarage" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
@endsection
