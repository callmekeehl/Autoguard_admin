@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Liste des Utilisateurs</h1>

        <a href="{{ route('admin.utilisateurs.create') }}" class="btn btn-primary mb-4">Créer un nouvel utilisateur</a>

        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Adresse</th>
                <th>Téléphone</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($utilisateurs as $utilisateur)
                <tr>
                    <td>{{ $utilisateur['utilisateurId'] }}</td>
                    <td>{{ $utilisateur['nom'] }}</td>
                    <td>{{ $utilisateur['prenom'] }}</td>
                    <td>{{ $utilisateur['email'] }}</td>
                    <td>{{ $utilisateur['adresse'] }}</td>
                    <td>{{ $utilisateur['telephone'] }}</td>
                    <td>
                        <a href="{{ route('admin.utilisateurs.show', $utilisateur['utilisateurId']) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('admin.utilisateurs.edit', $utilisateur['utilisateurId']) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.utilisateurs.destroy', $utilisateur['utilisateurId']) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
