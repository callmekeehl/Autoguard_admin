@extends('layouts.admin')

@section('content')
    <h1>Créer une Nouvelle Déclaration</h1>

    <form action="{{ route('admin.declarations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nomProprio">Nom Propriétaire</label>
            <input type="text" name="nomProprio" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="prenomProprio">Prénom Propriétaire</label>
            <input type="text" name="prenomProprio" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="telephoneProprio">Téléphone Propriétaire</label>
            <input type="text" name="telephoneProprio" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="lieuLong">Longitude</label>
            <input type="text" name="lieuLong" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="lieuLat">Latitude</label>
            <input type="text" name="lieuLat" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="numChassis">Numéro de Châssis</label>
            <input type="text" name="numChassis" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="numPlaque">Numéro de Plaque</label>
            <input type="text" name="numPlaque" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="marque">Marque</label>
            <input type="text" name="marque" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="modele">Modèle</label>
            <input type="text" name="modele" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="dateHeure">Date et Heure</label>
            <input type="datetime-local" name="dateHeure" class="form-control" required max="{{ now()->format('Y-m-d\TH:i') }}">
        </div>

        <div class="form-group">
            <label for="photoCarteGrise">Photo de la Carte Grise</label>
            <input type="file" name="photoCarteGrise" class="form-control" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-primary">Créer</button>
    </form>

    <a href="{{ route('admin.declarations.index') }}" class="btn btn-secondary mt-4">Retour à la liste</a>
@endsection
