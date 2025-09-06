<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - Student Stress Monitor</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styleStudent.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar">
                <div class="brand-title">
                    <i class="fas fa-graduation-cap me-2"></i>
                    Student
                </div>
                <nav class="nav flex-column mt-3">
                    <a class="nav-link active" href="#" onclick="showPage('home')">
                        <i class="fas fa-home me-2"></i>
                        Home
                    </a>
                    <a class="nav-link" href="#" onclick="showPage('data')">
                        <i class="fas fa-edit me-2"></i>
                        Schedule Data
                    </a>
                    <a class="nav-link" href="#" onclick="showPage('profile')">
                        <i class="fas fa-user me-2"></i>
                        Profile
                    </a>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10">
                <div class="main-content">
                    <!-- Home Page -->
                    <div id="home" class="page-content active">
                        <h1 class="page-title">
                            <i class="fas fa-star me-2"></i>
                            Welcome to Your Future
                        </h1>

                        <div class="quote-card" id="quoteCard">
                            <div class="quote-text" id="quoteText"></div>
                            <div class="quote-author" id="quoteAuthor"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-card text-center">
                                    <i class="fas fa-book-open fa-3x mb-3" style="color: var(--accent-purple);"></i>
                                    <h4>Study Smart</h4>
                                    <p>Track your learning hours and optimize your study schedule for maximum efficiency.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stats-card text-center">
                                    <i class="fas fa-chart-line fa-3x mb-3" style="color: var(--accent-cyan);"></i>
                                    <h4>Progress Tracking</h4>
                                    <p>Monitor your daily activities and maintain a balanced lifestyle for success.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stats-card text-center">
                                    <i class="fas fa-trophy fa-3x mb-3" style="color: var(--accent-purple);"></i>
                                    <h4>Achieve Goals</h4>
                                    <p>Set targets and celebrate your achievements on the path to your bright future.</p>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-4">
                            <div class="card-header">
                                <h4 class="mb-0">
                                    <i class="fas fa-lightbulb me-2"></i>
                                    Tips for Success
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5><i class="fas fa-clock me-2 text-primary"></i>Time Management</h5>
                                        <p>Organize your schedule effectively to balance study, sleep, and activities.</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h5><i class="fas fa-heart me-2 text-danger"></i>Stay Healthy</h5>
                                        <p>Maintain physical fitness and social connections for overall well-being.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Data Input Page -->
                    <div id="data" class="page-content">
                        <h1 class="page-title">
                            <i class="fas fa-calendar-alt me-2"></i>
                            Schedule Management
                        </h1>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="mb-0" id="dataFormTitle">
                                    <i class="fas fa-plus-circle me-2"></i>
                                    Add New Schedule Data
                                </h4>
                            </div>
                            <div class="card-body">
                                <form id="scheduleForm">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Class</label>
                                                <input type="text" class="form-control" id="studentClass" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">GPA</label>
                                                <input type="number" class="form-control" id="studentGPA" step="0.01" min="0" max="4" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Study Hours (per day)</label>
                                                <input type="number" class="form-control" id="studyHours" min="0" max="24" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Sleep Hours (per day)</label>
                                                <input type="number" class="form-control" id="sleepHours" min="0" max="24" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Extracurricular Hours</label>
                                                <input type="number" class="form-control" id="extracurricularHours" min="0" max="24" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Physical Activity Hours</label>
                                                <input type="number" class="form-control" id="physicalHours" min="0" max="24" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Social Activity Hours</label>
                                                <input type="number" class="form-control" id="socialHours" min="0" max="24" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary" id="submitBtn">
                                            <i class="fas fa-save me-2"></i>
                                            Save Schedule
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Schedule Summary -->
                        <div class="card mt-4" id="summaryCard" style="display: none;">
                            <div class="card-header">
                                <h4 class="mb-0">
                                    <i class="fas fa-chart-pie me-2"></i>
                                    Latest Schedule Summary
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="row" id="schedulePreview">
                                    <!-- Schedule preview will be populated here -->
                                </div>
                                <div class="progress mt-3">
                                    <div class="progress-bar" id="scheduleProgress" role="progressbar" style="width: 0%; background: linear-gradient(135deg, var(--accent-purple), var(--accent-cyan));">
                                        <span id="progressText">0/24 hours</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Profile Page -->
                    <div id="profile" class="page-content">
                        <h1 class="page-title">
                            <i class="fas fa-user me-3"></i>
                            Student Profile
                        </h1>

                        <div class="row">
                            <div class="col-md-8 mx-auto">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Profile</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center mb-4">
                                            <img src="https://cdn-icons-png.flaticon.com/256/4537/4537177.png" alt="Profile Picture" class="profile-img" id="profileImage">
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
                                                <input type="email" class="form-control" id="email" value="alice@student.com" readonly>
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
    <script src="js/scriptStudent.js"></script>
</body>
</html>
