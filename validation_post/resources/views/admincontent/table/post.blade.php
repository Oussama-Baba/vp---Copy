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
                        <div class="search-box">
                            <i class="material-icons">&#xE8B6;</i>
                            <input type="text" class="form-control" placeholder="Rechercher&hellip;" id="search">
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Média</th>
                        <th>Client</th>
                        <th>Statut</th>
                        <th>Nom de la Page</th>
                        <th>Actions</th>
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
                                <img src="{{ asset('storage/' . $post->media_path) }}" alt="Media" style="width: 50px; height: 50px;">
                            @else
                                Aucun média
                            @endif
                        </td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->status }}</td>
                        <td>{{ $post->page_name }}</td>
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
                {{ $posts->links() }}
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
    });

    document.getElementById('search').addEventListener('input', function() {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('tbody tr');
        rows.forEach(row => {
            const title = row.children[1].textContent.toLowerCase();
            if (title.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
