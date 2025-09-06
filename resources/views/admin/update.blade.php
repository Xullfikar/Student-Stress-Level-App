@extends('admin.layouts');

@section('content')
    <!-- Create Account Section -->
    <div id="create-account" class="content-section active">
        <h1 class="page-title">
            <i class="bi bi-person-gear"></i> Update Account
        </h1>
        <div class="card">
            <div class="card-header">
                <i class="bi bi-person-gear"></i> Update Account Information
            </div>
            <div class="card-body">
                <form action="{{ route('admin.updateUser', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control @error('fullName') is-invalid @enderror" name="fullName" placeholder="Enter full name" value="{{ old('fullName', $user->fullName) }}">
                            </div>
                            @error('fullName')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter email address" value="{{ old('email', $user->email) }}">
                            </div>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-control @error('role') is-invalid @enderror" name="role">
                                    <option value="" >Select Role</option>
                                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="teacher" {{ old('role', $user->role) == 'teacher' ? 'selected' : '' }}>Teacher</option>
                                    <option value="student" {{ old('role', $user->role) == 'student' ? 'selected' : '' }}>Student</option>
                                </select>
                            </div>
                            @error('role')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status" class="form-label">Account Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" name="status">
                                    <option value="1" {{ old('status', $user->status) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $user->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                            @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i> Update Account
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
