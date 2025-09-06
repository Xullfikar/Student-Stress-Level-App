@extends('admin.layouts');

@section('content')
    <!-- Delete Account Section -->
    <div id="delete-account" class="content-section active">
        <h1 class="page-title">
            <i class="bi bi-person-x"></i> Delete Account
        </h1>

        <div class="card">
            <div class="card-header">
                <i class="bi bi-exclamation-triangle"></i> Account Management
            </div>
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
                            <tr data-id="001">
                                <td>001</td>
                                <td>John Doe</td>
                                <td>john@gmail.com</td>
                                <td>Admin</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>
                                    <button class="btn btn-danger btn-sm" onclick="deleteAccount('001')">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                            <tr data-id="002">
                                <td>002</td>
                                <td>Jane Smith</td>
                                <td>jane@gmail.com</td>
                                <td>Student</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>
                                    <button class="btn btn-danger btn-sm" onclick="deleteAccount('002')">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                            <tr data-id="003">
                                <td>003</td>
                                <td>Bob Johnson</td>
                                <td>bob@gmail.com</td>
                                <td>Teacher</td>
                                <td><span class="badge badge-danger">Inactive</span></td>
                                <td>
                                    <button class="btn btn-danger btn-sm" onclick="deleteAccount('003')">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
