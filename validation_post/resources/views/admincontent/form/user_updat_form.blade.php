@extends('layouts.dashboard')

@section('title', 'Formulaire de Mise à Jour de l\'Utilisateur')

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
            <h1 class="text-center">Mettre à jour les informations de l'utilisateur</h1>
        </div>

        <!-- Formulaire -->
        <div class="col-12 col-md-8 col-lg-6">
            <form class="bg-light p-4 rounded shadow-sm" action="{{ route('User.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Nom Complet -->
                <div class="mb-3">
                    <label for="inputName" class="form-label">Nom Complet</label>
                    <input type="text" name="name" class="form-control" id="inputName" value="{{ old('name', $user->name) }}" placeholder="Entrez le nom complet">
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail" value="{{ old('email', $user->email) }}" placeholder="Entrez l'email">
                </div>

                <!-- Mot de Passe -->
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Mot de Passe</label>
                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Entrez un nouveau mot de passe (laisser vide s'il n'y a pas de changement)">
                </div>

                <!-- Confirmer le Mot de Passe -->
                <div class="mb-3">
                    <label for="inputConfirmPassword" class="form-label">Confirmer le Mot de Passe</label>
                    <input type="password" name="password_confirmation" class="form-control" id="inputConfirmPassword" placeholder="Confirmer le nouveau mot de passe">
                </div>

                <!-- Téléphone -->
                <div class="mb-3">
                    <label for="inputTelephone" class="form-label">Téléphone</label>
                    <input type="text" name="telephone" class="form-control" id="inputTelephone" value="{{ old('telephone', $user->telephone) }}" placeholder="Entrez le numéro de téléphone">
                </div>

                <!-- Nombre de Vidéos -->
                <div class="mb-3">
                    <label for="inputNbVedio" class="form-label">Nombre de Vidéos</label>
                    <input type="number" name="nb_vedio" class="form-control" id="inputNbVedio" value="{{ old('nb_vedio', $user->nb_vedio) }}" placeholder="Entrez le nombre de vidéos">
                </div>

                <!-- Nombre de Réels -->
                <div class="mb-3">
                    <label for="inputNbrReal" class="form-label">Nombre de Réels</label>
                    <input type="number" name="nbr_real" class="form-control" id="inputNbrReal" value="{{ old('nbr_real', $user->nbr_real) }}" placeholder="Entrez le nombre de réels">
                </div>

                <!-- Nombre de Posts -->
                <div class="mb-3">
                    <label for="inputNbrPost" class="form-label">Nombre de Posts</label>
                    <input type="number" name="nbr_post" class="form-control" id="inputNbrPost" value="{{ old('nbr_post', $user->nbr_post) }}" placeholder="Entrez le nombre de posts">
                </div>

                <!-- Logo -->
                <div class="mb-3">
                    <label for="inputLogo" class="form-label">Logo</label>
                    <input type="file" name="logo" class="form-control" id="inputLogo">
                    @if ($user->logo)
                        <img src="{{ asset('storage/' . $user->logo) }}" alt="Logo" class="mt-2" style="max-width: 150px;">
                    @endif
                </div>

                <!-- Rôle -->
                <div class="mb-3">
                    <label for="inputRole" class="form-label">Rôle</label>
                    <select id="inputRole" name="role" class="form-select">
                        <option value="client" {{ old('role', $user->role) == 'client' ? 'selected' : '' }}>Client</option>
                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>

                <!-- Bouton de Soumission -->
                <div class="text-right" style="margin-top: 30;">
                    <button type="submit" class="btn btn-success">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
