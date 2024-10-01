@extends('layouts.admin')

@section('content')
    <h1>Détails de la Déclaration</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Déclaration ID: {{ $declaration['declarationId'] }}</h5>
            <p><strong>Nom Propriétaire :</strong> {{ $declaration['nomProprio'] }}</p>
            <p><strong>Prénom Propriétaire :</strong> {{ $declaration['prenomProprio'] }}</p>
            <p><strong>Téléphone Propriétaire :</strong> {{ $declaration['telephoneProprio'] }}</p>
            <p><strong>Numéro de Plaque :</strong> {{ $declaration['numPlaque'] }}</p>
            <p><strong>Numéro de Châssis :</strong> {{ $declaration['numChassis'] }}</p>
            <p><strong>Marque :</strong> {{ $declaration['marque'] }}</p>
            <p><strong>Modèle :</strong> {{ $declaration['modele'] }}</p>
            <p><strong>Longitude :</strong> {{ $declaration['lieuLong'] }}</p>
            <p><strong>Latitude :</strong> {{ $declaration['lieuLat'] }}</p>
            <p><strong>Date et Heure :</strong> {{ $declaration['dateHeure'] }}</p>
            <p><strong>Statut :</strong> {{ $declaration['statut'] }}</p>

            @if (!empty($declaration['photoCarteGrise']))
                <p><strong>Photo Carte Grise :</strong></p>
                <img src="{{ asset($declaration['photoCarteGrise']) }}" alt="Photo Carte Grise" style="max-width: 300px;">
            @endif

            <a href="{{ route('admin.declarations.index') }}" class="btn btn-primary mt-4">Retour à la liste</a>
        </div>
    </div>
@endsection
