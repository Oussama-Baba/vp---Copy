@extends('layouts.dashboard')

@section('title', 'Comment Dashboard')

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
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>Détails des <b>Commentaires</b></h2>
                    </div>
                    <div class="col-sm-4">
                        <form method="GET" action="{{ route('comments.index') }}" class="mb-3">
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
                        <th>{{ __('Post Title') }}</th>
                        <th>{{ __('Comment') }}</th>
                        <th>{{ __('User') }}</th>
                        <th>{{ __('Created At') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td>{{ $comment->id }}</td>
                        <td>{{ $comment->post->title }}</td>
                        <td>{{ Str::limit($comment->comment, 50) }}</td>
                        <td>{{ $comment->user->name }}</td>
                        <td>{{ $comment->created_at->format('Y-m-d H:i:s') }}</td>
                        <td>
                            <a  class="view" title="Voir" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                            <a href="#" class="delete" title="Supprimer" data-toggle="tooltip" data-id="{{ $comment->id }}"><i class="material-icons">&#xE872;</i></a>
                            <form id="delete-form-{{ $comment->id }}" action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display: none;">
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
                    Affichage de <b>{{ $comments->firstItem() }}</b> à <b>{{ $comments->lastItem() }}</b> sur <b>{{ $comments->total() }}</b> entrées
                </div>
                {{ $comments->links() }}
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
                const commentId = this.getAttribute('data-id');
                if (confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?')) {
                    document.getElementById('delete-form-' + commentId).submit();
                }
            });
        });
    });
</script>
