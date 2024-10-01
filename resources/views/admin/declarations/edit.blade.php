@extends('layouts.admin')

@section('content')
    <h1>Modifier la Déclaration</h1>

    <form action="{{ route('admin.declarations.update', $declaration['declarationId']) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nomProprio">Nom Propriétaire</label>
            <input type="text" name="nomProprio" value="{{ $declaration['nomProprio'] }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="prenomProprio">Prénom Propriétaire</label>
            <input type="text" name="prenomProprio" value="{{ $declaration['prenomProprio'] }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="telephoneProprio">Téléphone Propriétaire</label>
            <input type="text" name="telephoneProprio" value="{{ $declaration['telephoneProprio'] }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="numPlaque">Numéro de Plaque</label>
            <input type="text" name="numPlaque" value="{{ $declaration['numPlaque'] }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="numChassis">Numéro de Châssis</label>
            <input type="text" name="numChassis" value="{{ $declaration['numChassis'] }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="marque">Marque</label>
            <input type="text" name="marque" value="{{ $declaration['marque'] }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="modele">Modèle</label>
            <input type="text" name="modele" value="{{ $declaration['modele'] }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="lieuLong">Longitude</label>
            <input type="text" name="lieuLong" value="{{ $declaration['lieuLong'] }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="lieuLat">Latitude</label>
            <input type="text" name="lieuLat" value="{{ $declaration['lieuLat'] }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="dateHeure">Date et Heure</label>
            <input type="datetime-local" name="dateHeure" value="{{ \Carbon\Carbon::parse($declaration['dateHeure'])->format('Y-m-d\TH:i') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="statut">Statut</label>
            <input type="text" name="statut" value="{{ $declaration['statut'] }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="photoCarteGrise">Photo de la Carte Grise</label>
            <input type="file" name="photoCarteGrise" class="form-control">
            @if (!empty($declaration['photoCarteGrise']))
                <p>Photo Actuelle :</p>
                <img src="{{ asset($declaration['photoCarteGrise']) }}" alt="Photo Carte Grise" style="max-width: 300px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>

    <a href="{{ route('admin.declarations.index') }}" class="btn btn-secondary mt-4">Retour à la liste</a>
@endsection
