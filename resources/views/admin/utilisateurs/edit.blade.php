@extends('layouts.admin')

@section('content')
    <h1>Modifier l'Utilisateur</h1>

    <form action="{{ route('admin.utilisateurs.update', $utilisateur['utilisateurId']) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" value="{{ $utilisateur['nom'] }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" value="{{ $utilisateur['prenom'] }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ $utilisateur['email'] }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" value="{{ $utilisateur['adresse'] }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" value="{{ $utilisateur['telephone'] }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection
