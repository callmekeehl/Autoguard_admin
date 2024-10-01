@extends('layouts.admin')

@section('content')
    <h1>Connexion Administrateur</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('admin.login') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="motDePasse">Mot de Passe</label>
            <input type="password" name="motDePasse" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Se Connecter</button>
    </form>
@endsection
