@extends('layouts.admin')

@section('content')
    <h1>Modifier le Garage</h1>

    <form action="{{ route('admin.garages.update', $garage['utilisateurId']) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="nom">Nom</label>
            <input type="text" name="nom" value="{{ $garage['nom'] }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" value="{{ $garage['prenom'] }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ $garage['email'] }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" value="{{ $garage['adresse'] }}" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" value="{{ $garage['telephone'] }}" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="nomGarage">Nom Garage</label>
            <input type="text" name="nomGarage" value="{{ $garage['nomGarage'] }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="adresseGarage">Adresse Garage</label>
            <input type="text" name="adresseGarage" value="{{ $garage['adresseGarage'] }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection
