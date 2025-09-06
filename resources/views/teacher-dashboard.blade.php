<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard - Student Stress Monitor</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styleTeacher.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 px-0">
                <nav class="sidebar">
                    <div class="brand-title">
                        <i class="fas fa-graduation-cap me-2"></i>
                        Teacher
                    </div>
                    <ul class="nav flex-column px-3">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" onclick="showDashboard()">
                                <i class="fas fa-tachometer-alt me-2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="showDetail()">
                                <i class="fas fa-chart-line me-2"></i>
                                Detail Analysis
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="showProfile()">
                                <i class="fas fa-user me-2"></i>
                                Profile
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10">
                <div class="main-content">
                    <!-- Dashboard Page -->
                    <div id="dashboard-page">
                        <h1 class="page-title">
                            <i class="fas fa-tachometer-alt me-3"></i>
                            Student Dashboard
                        </h1>

                        <!-- Statistics Cards -->
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="stats-card text-center">
                                    <div class="stats-number text-danger">12</div>
                                    <h5>High Stress Students</h5>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stats-card text-center">
                                    <div class="stats-number text-warning">18</div>
                                    <h5>Moderate Stress Students</h5>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stats-card text-center">
                                    <div class="stats-number text-success">25</div>
                                    <h5>Low Stress Students</h5>
                                </div>
                            </div>
                        </div>

                        <!-- Students Grid -->
                        <div class="row" id="students-grid">
                            <!-- Student cards will be generated here -->
                        </div>
                    </div>

                    <!-- Detail Page -->
                    <div id="detail-page" style="display: none;">
                        <h1 class="page-title">
                            <i class="fas fa-chart-line me-3"></i>
                            Detailed Student Analysis
                        </h1>

                        <!-- Filters -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="classFilter" class="form-label">Filter by Class:</label>
                                <select class="form-control" id="classFilter" onchange="filterStudents()">
                                    <option value="">All Classes</option>
                                    <option value="10A">10A</option>
                                    <option value="10B">10B</option>
                                    <option value="11A">11A</option>
                                    <option value="11B">11B</option>
                                    <option value="12A">12A</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="stressFilter" class="form-label">Filter by Stress Level:</label>
                                <select class="form-control" id="stressFilter" onchange="filterStudents()">
                                    <option value="">All Levels</option>
                                    <option value="high">High</option>
                                    <option value="moderate">Moderate</option>
                                    <option value="low">Low</option>
                                </select>
                            </div>
                        </div>

                        <!-- Students Table -->
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0"><i class="fas fa-users me-2"></i>Student Details</h5>
                                <button class="btn btn-sm btn-outline-secondary" onclick="location.reload()">
                <i class="fas fa-sync-alt me-1"></i> Refresh Data
            </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Student Name</th>
                                                <th>Class</th>
                                                <th>Study Hours</th>
                                                <th>Sleep Hours</th>
                                                <th>Extracurricular Hours</th>
                                                <th>Physical Activity Hours</th>
                                                <th>Social Hours</th>
                                                <th>Stress Level</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($students as $student)
                                                <tr>
                                                    <td>{{ $student->student->full_name }}</td>
                                                    <td>{{ $student->class }}</td>
                                                    <td>{{ $student->study_hours_per_day }}</td>
                                                    <td>{{ $student->sleep_hours_per_day }} </td>
                                                    <td>{{ $student->extracurricular_hours }}</td>
                                                    <td>{{ $student->physical_activity_hours }}</td>
                                                    <td>{{ $student->social_activity_hours }}</td>
                                                    <td>1</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Profile Page -->
                    <div id="profile-page" style="display: none;">
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
                                                <input type="file" id="imageUpload" accept="image/*" style="display: none;" onchange="changeProfileImage(event)">
                                                <button class="btn btn-primary" onclick="document.getElementById('imageUpload').click()">
                                                    <i class="fas fa-camera me-2"></i>Change Picture
                                                </button>
                                            </div>
                                        </div>

                                        <form onsubmit="updateProfile(event)">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email (Username)</label>
                                                <input type="email" class="form-control" id="email" value="bob@teacher.com" readonly>
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
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="js/scriptTeacher.js"></script>
    <!-- <script>
        console.log("masuk");

        alert("masuk");
        function showDetail () {
            alert("jalan");
            document.getElementById('dashboard-page').style.display = 'none';
            document.getElementById('detail-page').style.display = 'block';
            document.getElementById('profile-page').style.display = 'none';
            updateActiveNav(1);
            generateStudentsTable();
        }
    </script> -->
</body>
</html>
