@extends('layouts.dashboard')

@section('title', 'User Form')

@section('content')



<div class="d-flex flex-column justify-content-center align-items-center vh-100">
    <div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div>
    <!-- Header -->
    <h1 class="mb-4 text-center">Ajouter Information</h1>

    <!-- Form -->
    <form class="row g-3 p-4 bg-light shadow" style="width: 1000px; border-radius: 8px;" method="POST" action="{{route('User.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label for="inputName4" class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" id="inputName4" >
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail4" >
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="inputPassword4">
        </div>
        <div class="col-md-6">
            <label for="inputConfirmPassword" class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" id="inputConfirmPassword">
        </div>
        <div class="col-md-6">
            <label for="inputName5" class="form-label">Telephone</label>
            <input type="text" name="telephone" class="form-control" id="inputName5" value="{{ old('telephone') }}">
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label">Role</label>
            <select id="inputState" name="role" class="form-select">
                <option value="client" {{ old('role') == 'client' ? 'selected' : '' }}>Client</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>
        <div class="col-12 text-right">
            <button type="submit" class="btn btn-success" style="margin-top: 30px;">Ajouter</button>
        </div>
    </form>
</div>

@endsection
