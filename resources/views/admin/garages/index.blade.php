@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Liste des comptes Garages</h1>

        <a href="{{ route('admin.garages.create') }}" class="btn btn-primary mb-4">Créer un nouveau compte garage</a>

        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>ID utilisateur</th>
                <th>ID Garage</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Adresse</th>
                <th>Téléphone</th>
                <th>Nom Garage</th>
                <th>Adresse Garage</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($garages as $garage)
                <tr>
                    <td>{{ $garage['utilisateurId'] }}</td>
                    <td>{{ $garage['garageId'] }}</td>
                    <td>{{ $garage['nom'] }}</td>
                    <td>{{ $garage['prenom'] }}</td>
                    <td>{{ $garage['email'] }}</td>
                    <td>{{ $garage['adresse'] }}</td>
                    <td>{{ $garage['telephone'] }}</td>
                    <td>{{ $garage['nomGarage'] }}</td>
                    <td>{{ $garage['adresseGarage'] }}</td>

                    <td>
                        <a href="{{ route('admin.garages.show', $garage['utilisateurId']) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('admin.garages.edit', $garage['utilisateurId']) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.garages.destroy', $garage['utilisateurId']) }}" method="POST" style="display:inline;">
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
