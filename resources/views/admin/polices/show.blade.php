@extends('layouts.admin')

@section('content')
    <h1>Détails du compte Police</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $police['nom'] }} {{ $police['prenom'] }}</h5>
            <p><strong>Id utilisateur:</strong> {{ $police['utilisateurId'] }}</p>
            <p><strong>Id Police:</strong> {{ $police['policeId'] }}</p>
            <p><strong>Email :</strong> {{ $police['email'] }}</p>
            <p><strong>Téléphone :</strong> {{ $police['telephone'] }}</p>
            <p><strong>Adresse :</strong> {{ $police['adresse'] }}</p>
            <p><strong>Téléphone :</strong> {{ $police['telephone'] }}</p>
            <p><strong>Nom département :</strong> {{ $police['nomDepartement'] }}</p>
            <p><strong>Adresse département :</strong> {{ $police['adresseDepartement'] }}</p>
        </div>
    </div>

    <a href="{{ route('admin.polices.index') }}" class="btn btn-primary mt-4">Retour à la liste</a>
@endsection
