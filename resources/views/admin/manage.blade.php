@extends('admin.layouts');

@section('content')
    <!-- Delete Account Section -->
    <div id="delete-account" class="content-section active">
        <h1 class="page-title">
            <i class="bi bi-person-x"></i> Manage Account
        </h1>

        <div class="card">
            <div class="card-header">
                <i class="bi bi-exclamation-triangle"></i> Account Management
            </div>
             @session('success')
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{$value}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endsession
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->fullName }}</td>
                                <td>{{ $user->email}}</td>
                                <td>{{ $user->role }}</td>
                                <td><span class="badge {{ $user->status == 1 ? "badge-success" : "badge-danger" }}">{{ $user->status == 1 ? "active" : "non active" }}</span></td>
                                <td>
                                    <a href="{{ route('admin.update', $user->id) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Update
                                    </a>
                                    <form action="{{ route('admin.destroy', $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this data ?')">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
