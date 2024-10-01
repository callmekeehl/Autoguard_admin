@extends('layouts.admin')

@section('content')
    <h1>Créer un Nouvel Agent de Police</h1>

    <form action="{{ route('admin.polices.store') }}" method="POST">
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
            <label for="nomDepartement">Nom Département</label>
            <input type="text" name="nomDepartement" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="adresseDepartement">Adresse Département</label>
            <input type="text" name="adresseDepartement" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
@endsection
