@extends('layouts.dashboard')

@section('title', 'Post Form')

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
    </div>
    <!-- Header -->
    <h1 class="mb-4 text-center">Ajouter un nouveau post</h1>

    <!-- Form -->
    <form class="row g-4 p-4 bg-light shadow rounded" style="width: 1000px;" method="POST" action="{{ route('Post.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="col-md-6">
            <label for="inputTitle" class="form-label">Titre</label>
            <input type="text" name="title" class="form-control" id="inputTitle" value="{{ old('title') }}" placeholder="Enter the title">
        </div>

        <div class="col-md-6">
            <label for="inputDescription" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="inputDescription" rows="3" placeholder="Enter the description">{{ old('description') }}</textarea>
        </div>

        <div class="col-md-6">
            <label for="inputPhoto" class="form-label"> Télécharger un média</label>
            <input type="file" name="media" class="form-control" id="inputPhoto" accept="image/*,video/*">
        </div>

        <div class="col-md-6">
            <label for="inputPublishDate" class="form-label">Date de publication</label>
            <input type="date" name="publish_date" class="form-control" id="inputPublishDate" value="{{ old('publish_date') }}">
        </div>

        <div class="col-md-6">
            <label for="inputClient" class="form-label">Sélectionner un client</label>
            <select id="inputClient" name="user_id" class="form-select">
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ old('user_id') == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="inputStatus" class="form-label">Status</label>
            <select id="inputStatus" name="status" class="form-select">
                <option value="processing" {{ old('status') == 'processing' ? 'selected' : '' }}>En traitement</option>
                <option value="accepted" {{ old('status') == 'accepted' ? 'selected' : '' }}> Accepté</option>
                <option value="declined" {{ old('status') == 'declined' ? 'selected' : '' }}>Refusé</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="inputPageName" class="form-label">Nom de la page</label>
            <input type="text" name="page_name" class="form-control" id="inputPageName" value="{{ old('page_name') }}" placeholder="Entrez le nom de la page">
        </div>

        <div class="col-12 text-right">
            <button type="submit" class="btn btn-success" style="margin-top: 30px;">Add Post</button>
        </div>
    </form>
</div>
@endsection
