@extends('layouts.dashboard')

@section('title', 'Create Post')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="col-12">
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- Form Header -->
        <div class="col-12 mb-4">
            <h1 class="text-center">Ajouter un nouveau post</h1>
        </div>

        <!-- Form -->
        <div class="col-12 col-md-10 col-lg-8">
            <form class="bg-light p-4 rounded shadow-sm" method="POST" action="{{ route('Post.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div class="mb-3">
                    <label for="inputTitle" class="form-label">Titre</label>
                    <input type="text" name="title" class="form-control" id="inputTitle" value="{{ old('title') }}" placeholder="Enter the title">
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="inputDescription" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="inputDescription" rows="4" placeholder="Enter the description">{{ old('description') }}</textarea>
                </div>

                <!-- Media -->
                <div class="mb-3">
                    <label for="inputPhoto" class="form-label">Télécharger un média</label>
                    <input type="file" name="media" class="form-control" id="inputPhoto" accept="image/*,video/*">
                </div>

                <!-- Publish Date -->
                <div class="mb-3">
                    <label for="inputPublishDate" class="form-label">Date de publication</label>
                    <input type="date" name="publish_date" class="form-control" id="inputPublishDate" value="{{ old('publish_date') }}">
               </div>

                <!-- Client Selection -->
                <div class="mb-3">
                    <label for="inputClient" class="form-label">Sélectionner un client</label>
                    <select id="inputClient" name="user_id" class="form-select">
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}" {{ old('user_id') == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label for="inputStatus" class="form-label">Statut</label>
                    <select id="inputStatus" name="status" class="form-select">
                        <option value="processing" {{ old('status') == 'processing' ? 'selected' : '' }}>En traitement</option>
                        <option value="accepted" {{ old('status') == 'accepted' ? 'selected' : '' }}>Accepté</option>
                        <option value="declined" {{ old('status') == 'declined' ? 'selected' : '' }}>Refusé</option>
                    </select>
                </div>

                <!-- Page Name -->
                <div class="mb-3">
                    <label for="inputPageName" class="form-label">Nom de la page</label>
                    <input type="text" name="page_name" class="form-control" id="inputPageName" value="{{ old('page_name') }}" placeholder="Entrez le nom de la page">
                </div>

                <!-- Colon Hashtags -->
                <div class="mb-3">
                    <label for="inputColonHashtags" class="form-label">Hashtags avec deux-points</label>
                    <input type="text" name="colon_hashtags" class="form-control" id="inputColonHashtags" value="{{ old('colon_hashtags') }}" placeholder="Entrez les hashtags, séparés par des deux-points">
                </div>

                <!-- Send Email Checkbox -->
                <div class="mb-3 form-check">
                    <input type="checkbox" name="email_sent" class="form-check-input" value="1" id="sendEmailCheckbox" {{ old('email_sent') ? 'checked' : '' }}>
                    <label class="form-check-label" for="sendEmailCheckbox">Envoyer un email au client</label>
                </div>

                <!-- Submit Button -->
                <div class="text-right" style="margin-top: 30;">
                    <button type="submit" class="btn btn-success">Ajouter le post</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
