@extends('layouts.admin')

@section('content')
    <h1>Modifier le compte police</h1>

    @if(isset($police))
        <form action="{{ route('admin.polices.update', $police['utilisateurId']) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" value="{{ $police['nom'] ?? '' }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" value="{{ $police['prenom'] ?? '' }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ $police['email'] ?? '' }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" value="{{ $police['adresse'] ?? '' }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" name="telephone" value="{{ $police['telephone'] ?? '' }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="nomDepartement">Nom département</label>
                <input type="text" name="nomDepartement" value="{{ $police['nomDepartement'] ?? '' }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="adresseDepartement">Adresse département</label>
                <input type="text" name="adresseDepartement" value="{{ $police['adresseDepartement'] ?? '' }}" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    @else
        <p>Les détails de la police ne sont pas disponibles.</p>
    @endif
@endsection
