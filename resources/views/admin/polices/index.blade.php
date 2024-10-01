@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Liste des comptes Polices</h1>

        <a href="{{ route('admin.polices.create') }}" class="btn btn-primary mb-4">Créer un nouveau compte police</a>

        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>ID utilisateur</th>
                <th>ID police</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Adresse</th>
                <th>Téléphone</th>
                <th>Nom Département</th>
                <th>Adresse Département</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($polices as $police)
                <tr>
                    <td>{{ $police['utilisateurId'] }}</td>
                    <td>{{ $police['policeId'] }}</td>
                    <td>{{ $police['nom'] }}</td>
                    <td>{{ $police['prenom'] }}</td>
                    <td>{{ $police['email'] }}</td>
                    <td>{{ $police['adresse'] }}</td>
                    <td>{{ $police['telephone'] }}</td>
                    <td>{{ $police['nomDepartement'] }}</td>
                    <td>{{ $police['adresseDepartement'] }}</td>

                    <td>
                        <a href="{{ route('admin.polices.show', $police['utilisateurId']) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('admin.polices.edit', $police['utilisateurId']) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('admin.polices.destroy', $police['utilisateurId']) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
