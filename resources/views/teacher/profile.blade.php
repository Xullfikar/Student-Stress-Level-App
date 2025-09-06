@extends('teacher.layouts');

@section('content')
<!-- Profile Page -->
<div id="profile-page">
    <h1 class="page-title">
        <i class="fas fa-user me-3"></i>
        Teacher Profile
    </h1>

    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Profile</h5>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/257/257718.png" alt="Profile Picture" class="profile-img" id="profileImage">
                        <div class="mt-3">
                            <p class="h3">{{ auth()->user()->fullName }}</p>
                        </div>
                        <div class="mt-3">
                            <input type="file" id="imageUpload" accept="image/*" style="display: none;" onchange="changeProfileImage(event)">
                            <button class="btn btn-primary" onclick="document.getElementById('imageUpload').click()">
                                <i class="fas fa-camera me-2"></i>Change Picture
                            </button>
                        </div>
                    </div>

                    <form onsubmit="updateProfile(event)">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email (Username)</label>
                            <input type="email" class="form-control" id="email" value="{{ auth()->user()->email }}" readonly>
                            <div class="form-text">Email cannot be changed</div>
                        </div>

                        <div class="mb-3">
                            <label for="currentPassword" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="currentPassword" placeholder="Enter current password">
                        </div>

                        <div class="mb-3">
                            <label for="newPassword" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="newPassword" placeholder="Enter new password">
                        </div>

                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm new password">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
