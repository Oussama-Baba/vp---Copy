@extends('layouts.dashboard')

@section('title', 'Post Dashboard')

@section('content')

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="container-xl">
    <div class="col-sm-4 offset-sm-8 text-sm-right" style="margin-top: 100px;">
        <button type="button" class="btn btn-success" onclick="window.location.href='{{ route('Post.create') }}'">Ajouter</button>
    </div>
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>Détails des <b>Posts</b></h2>
                    </div>
                    <div class="col-sm-4">
                        <form method="GET" action="{{ route('Post.index') }}" class="mb-3">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search&hellip;" value="{{ request('search') }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>{{ __('ID') }}</th>
                        <th>{{ __('Titre') }}</th>
                        <th>{{ __('Description') }}</th>
                        <th>{{ __('Média') }}</th>
                        <th>{{ __('Client') }}</th>
                        <th>{{ __('Statut') }}</th>
                        <th>{{ __('Nom_de_la_Page') }}</th>
                        <th>{{ __('Envoyer Email') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ Str::limit($post->description, 50) }}</td>
                        <td>
                            @if($post->media_path)
                                @php
                                    $fileExtension = pathinfo($post->media_path, PATHINFO_EXTENSION);
                                    $isImage = in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']);
                                @endphp

                                @if($isImage)
                                    <img src="{{ asset('storage/' . $post->media_path) }}" alt="Media" style="width: 50px; height: 50px;">
                                @else
                                    <video style="width: 50px; height: 50px;" controls>
                                        <source src="{{ asset('storage/' . $post->media_path) }}" type="video/{{ $fileExtension }}" >
                                        Your browser does not support the video tag.
                                    </video>
                                @endif
                            @else
                                Aucun média
                            @endif
                        </td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->status }}</td>
                        <td>{{ $post->page_name }}</td>
                        <td>
                            <input type="checkbox" name="send_email" data-id="{{ $post->id }}" class="send-email-checkbox">
                        </td>
                        <td>
                            <a href="{{ route('Post.show', $post->id) }}" class="view" title="Voir" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                            <a href="{{ route('Post.edit', $post->id) }}" class="edit" title="Modifier" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="#" class="delete" title="Supprimer" data-toggle="tooltip" data-id="{{ $post->id }}"><i class="material-icons">&#xE872;</i></a>
                            <form id="delete-form-{{ $post->id }}" action="{{ route('Post.destroy', $post->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">
                    Affichage de <b>{{ $posts->firstItem() }}</b> à <b>{{ $posts->lastItem() }}</b> sur <b>{{ $posts->total() }}</b> entrées
                </div>
             {{ $posts->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.delete').forEach(function(element) {
            element.addEventListener('click', function(event) {
                event.preventDefault();
                const postId = this.getAttribute('data-id');
                if (confirm('Êtes-vous sûr de vouloir supprimer ce post ?')) {
                    document.getElementById('delete-form-' + postId).submit();
                }
            });
        });

</script>

