@extends('layouts.dashboard')

@section('title', 'Formulaire Utilisateur')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Afficher les erreurs de validation -->
        @if ($errors->any())
            <div class="col-12 mb-4">
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- En-tête du formulaire -->
        <div class="col-12 mb-4">
            <h1 class="text-center">Ajouter Information</h1>
        </div>

        <!-- Formulaire -->
        <div class="col-12 col-md-8 col-lg-6">
            <form class="bg-light p-4 rounded shadow-sm" method="POST" action="{{ route('User.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Nom complet -->
                <div class="mb-3">
                    <label for="inputName" class="form-label">Nom Complet</label>
                    <input type="text" name="name" class="form-control" id="inputName" placeholder="Entrez le nom complet">
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Entrez l'email">
                </div>

                <!-- Mot de passe -->
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Mot de Passe</label>
                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Entrez le mot de passe">
                </div>

                <!-- Confirmer le mot de passe -->
                <div class="mb-3">
                    <label for="inputConfirmPassword" class="form-label">Confirmer le Mot de Passe</label>
                    <input type="password" name="password_confirmation" class="form-control" id="inputConfirmPassword" placeholder="Confirmer le mot de passe">
                </div>

                <!-- Téléphone -->
                <div class="mb-3">
                    <label for="inputTelephone" class="form-label">Téléphone</label>
                    <input type="text" name="telephone" class="form-control" id="inputTelephone" placeholder="Entrez le numéro de téléphone">
                </div>

                <!-- Nombre de Vidéos -->
                <div class="mb-3">
                    <label for="inputNbVedio" class="form-label">Nombre de Vidéos</label>
                    <input type="number" name="nb_vedio" class="form-control" id="inputNbVedio" placeholder="Entrez le nombre de vidéos">
                </div>

                <!-- Nombre de Réels -->
                <div class="mb-3">
                    <label for="inputNbrReal" class="form-label">Nombre de Réels</label>
                    <input type="number" name="nbr_real" class="form-control" id="inputNbrReal" placeholder="Entrez le nombre de réels">
                </div>

                <!-- Nombre de Posts -->
                <div class="mb-3">
                    <label for="inputNbrPost" class="form-label">Nombre de Posts</label>
                    <input type="number" name="nbr_post" class="form-control" id="inputNbrPost" placeholder="Entrez le nombre de posts">
                </div>

                <!-- Logo -->
                <div class="mb-3">
                    <label for="inputLogo" class="form-label">Logo</label>
                    <input type="file" name="logo" class="form-control" id="inputLogo">
                </div>

                <!-- Rôle -->
                <div class="mb-3">
                    <label for="inputRole" class="form-label">Rôle</label>
                    <select id="inputRole" name="role" class="form-select">
                        <option value="client">Client</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <!-- Bouton de soumission -->
                <div class="text-right" style="margin-top: 30;">
                    <button type="submit" class="btn btn-success">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
