@extends('layouts.admin')

@section('content')
    <h1>Détails de l'Utilisateur</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $utilisateur['nom'] }} {{ $utilisateur['prenom'] }}</h5>
            <p><strong>Id :</strong> {{ $utilisateur['utilisateurId'] }}</p>
            <p><strong>Email :</strong> {{ $utilisateur['email'] }}</p>
            <p><strong>Téléphone :</strong> {{ $utilisateur['telephone'] }}</p>
            <p><strong>Adresse :</strong> {{ $utilisateur['adresse'] }}</p>
            <p><strong>Téléphone :</strong> {{ $utilisateur['telephone'] }}</p>
        </div>
    </div>

    <a href="{{ route('admin.utilisateurs.index') }}" class="btn btn-primary mt-4">Retour à la liste</a>
@endsection
