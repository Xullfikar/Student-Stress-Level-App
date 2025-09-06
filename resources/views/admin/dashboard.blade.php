@extends('admin.layouts');

@section('content')
    <!-- Dashboard Section -->
    <div class="content-section active">
        <h1 class="page-title">
            <i class="bi bi-speedometer2"></i> Account Dashboard
        </h1>

        <!-- Statistics Cards -->
        <div class="row">
            <div class="col-md-4">
                <div class="stats-card">
                    <div class="stats-number">{{ $total_users }}</div>
                    <div class="text-muted">Total Accounts</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-card">
                    <div class="stats-number">{{ $total_active_users }}</div>
                    <div class="text-muted">Active Accounts</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-card">
                    <div class="stats-number">{{ $total_inactive_users }}</div>
                    <div class="text-muted">Inactive Accounts</div>
                </div>
            </div>
        </div>

        <!-- Recent Accounts Table -->
        <div class="card">
            <div class="card-header">
                <i class="bi bi-people"></i> Recent Account Data
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
                                <th>Date Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->fullName  }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td><span class="badge {{ $user->status == 1 ? "badge-success" : "badge-danger" }}">{{ $user->status == 1 ? "active" : "non active" }}</span></td>
                                    <td>{{ $user->created_at->format('d M Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
