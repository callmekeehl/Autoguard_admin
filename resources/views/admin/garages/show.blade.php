@extends('layouts.admin')

@section('content')
    <h1>Détails du Garage</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $garage['nomGarage'] }}</h5>
            <p><strong>Nom :</strong> {{ $garage['nom'] }}</p>
            <p><strong>Prénom :</strong> {{ $garage['prenom'] }}</p>
            <p><strong>Email :</strong> {{ $garage['email'] }}</p>
            <p><strong>Téléphone :</strong> {{ $garage['telephone'] }}</p>
            <p><strong>Adresse :</strong> {{ $garage['adresseGarage'] }}</p>

        </div>
    </div>

    <a href="{{ route('admin.garages.index') }}" class="btn btn-primary mt-4">Retour à la liste</a>
@endsection
