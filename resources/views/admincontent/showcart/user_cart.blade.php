@extends('layouts.dashboard')

@section('title', 'User Cart')

@section('content')
<section class="vh-100" style="background-color: #f4f5f7;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <!-- Display Logo -->
              @if ($user->logo)
                <img src="{{ asset('storage/' . $user->logo) }}" alt="Logo" class="img-fluid my-5" style="width: 80px; border-radius: 50%;" />
              @else
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp" alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
              @endif

              <i class="far fa-edit mb-5"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6 style="color: black;">Information</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6 style="color: black;">Nom complet</h6>
                    <p class="text-muted">{{ $user->name }}</p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6 style="color: black;">Rôle</h6>
                    <p class="text-muted">{{ $user->role }}</p>
                  </div>
                </div>
                <h6 style="color: black;">Contact</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6 style="color: black;">Email</h6>
                    <p class="text-muted">{{ $user->email }}</p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6 style="color: black;">Téléphone</h6>
                    <p class="text-muted">{{ $user->telephone }}</p>
                  </div>
                </div>
                <h6 style="color: black;">Informations supplémentaires</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6 style="color: black;">Nombre de Vidéos</h6>
                    <p class="text-muted">{{ $user->nb_vedio }}</p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6 style="color: black;">Nombre de Réels</h6>
                    <p class="text-muted">{{ $user->nbr_real }}</p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6 style="color: black;">Nombre de Posts</h6>
                    <p class="text-muted">{{ $user->nbr_post }}</p>
                  </div>
                </div>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-primary" href="{{ route('User.index') }}" role="button">Retourner</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
