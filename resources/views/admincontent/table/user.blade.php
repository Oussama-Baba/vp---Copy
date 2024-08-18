@extends('layouts.dashboard')

@section('title', 'User Dashboard')

@section('content')
<div class="container-xl">

    <!-- resources/views/partials/flash-messages.blade.php -->

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

    <div class="col-sm-4 offset-sm-8 text-sm-right" style="margin-top: 100px;">
        <button type="button" class="btn btn-success" onclick="window.location.href='{{ route('User.create') }}'">Ajouter</button>
    </div>
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>{{ __('Gérer') }} <b>{{ __('Utilisateur') }}</b></h2>
                    </div>
                    <div class="col-sm-4">
                        <form method="GET" action="{{ route('User.index') }}" class="mb-3">
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
                        <th>{{ __('Id') }}</th>
                        <th>{{ __('Nom') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th>{{ __('Téléphone') }}</th>
                        <th>{{ __('Rôle') }}</th>
                        <th>{{ __('Créé_le') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ Str::limit($user->email, 14) }}</td>
                        <td>{{ $user->telephone }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <a href="{{ route('User.show',  $user->id) }}" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                            <a href="{{ route('User.edit',  $user->id) }}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="#" class="delete" title="Delete" data-toggle="tooltip" data-id="{{ $user->id }}"><i class="material-icons">&#xE872;</i></a>

                            <form id="delete-form-{{ $user->id }}" action="{{ route('User.destroy', $user->id) }}" method="POST" style="display: none;">
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
                    Showing <b>{{ $users->firstItem() }}</b> to <b>{{ $users->lastItem() }}</b> of <b>{{ $users->total() }}</b> entries
                </div>
                <ul class="pagination">
                    <!-- Previous Page Link -->
                    @if ($users->onFirstPage())
                        <li class="page-item disabled"><span class="page-link"><i class="fa fa-angle-double-left"></i></span></li>
                    @else
                        <li class="page-item"><a href="{{ $users->previousPageUrl() }}" class="page-link"><i class="fa fa-angle-double-left"></i></a></li>
                    @endif
                    <!-- Pagination Elements -->
                    @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                        @if ($page == $users->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                        @endif
                    @endforeach
                    <!-- Next Page Link -->
                    @if ($users->hasMorePages())
                        <li class="page-item"><a href="{{ $users->nextPageUrl() }}" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link"><i class="fa fa-angle-double-right"></i></span></li>
                    @endif
                </ul>
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
                const userId = this.getAttribute('data-id');
                if (confirm('Are you sure you want to delete this user?')) {
                    document.getElementById('delete-form-' + userId).submit();
                }
            });
        });
    });
</script>
