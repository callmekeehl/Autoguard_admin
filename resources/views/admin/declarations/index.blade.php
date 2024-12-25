@extends('layouts.admin')

@section('content')
    <h1>Liste des Déclarations</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ route('admin.declarations.create') }}" class="btn btn-primary mb-4">Créer une Nouvelle Déclaration</a>

    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Nom Propriétaire</th>
            <th>Prénom Propriétaire</th>
            <th>Numéro de Plaque</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($declarations as $declaration)
            <tr>
                <td>{{ $declaration['declarationId'] }}</td>
                <td>{{ $declaration['nomProprio'] }}</td>
                <td>{{ $declaration['prenomProprio'] }}</td>
                <td>{{ $declaration['numPlaque'] }}</td>
                <td>
                    <a href="{{ route('admin.declarations.show', $declaration['declarationId']) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('admin.declarations.edit', $declaration['declarationId']) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('admin.declarations.destroy', $declaration['declarationId']) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
