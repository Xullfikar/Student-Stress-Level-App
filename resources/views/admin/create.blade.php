@extends('admin.layouts');

@section('content')
    <!-- Create Account Section -->
    <div id="create-account" class="content-section active">
        <h1 class="page-title">
            <i class="bi bi-person-plus"></i> Create New Account
        </h1>
        <div class="card">
            <div class="card-header">
                <i class="bi bi-person-plus"></i> Account Information
            </div>
            <div class="card-body">
                <form action="{{ route('admin.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control @error('fullName') is-invalid @enderror" name="fullName" placeholder="Enter full name" value="{{ old('fullName') }}">
                            </div>
                            @error('fullName')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter email address" value="{{ old('email') }}">
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
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="teacher" {{ old('role') == 'teacher' ? 'selected' : '' }}>Teacher</option>
                                    <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student</option>
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
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter password">
                            </div>
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Confirm password">
                            </div>
                            @error('password_confirmation')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-person-plus"></i> Create Account
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
