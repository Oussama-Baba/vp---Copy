@extends('layouts.dashboard')

@section('title', 'User cart')

@section('content')
<section class="vh-100" style="background-color: #f4f5f7;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                alt="Avatar" class="img-fluid my-5" style="width: 80px;" />

              <i class="far fa-edit mb-5"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Information</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Nom complet </h6>
                    <p class="text-muted">{{$user->name}}</p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>role</h6>
                    <p class="text-muted">{{$user->role}}</p>
                  </div>
                </div>
                <h6>Contact</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>email</h6>
                    <p class="text-muted">{{$user->email}}</p>
                  </div>

                  <div class="col-6 mb-3">
                    <h6>telephone </h6>
                    <p class="text-muted">{{$user->telephone}}</p>
                  </div>
                </div>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-primary" href="{{ route('User.index') }}" role="button">retourner</a>

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
