<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Student Stress Monitor</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styleDashboard.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar">
                <div class="brand-title">
                    <i class="bi bi-gear-fill"></i>
                    Admin
                </div>
                <nav class="nav flex-column">
                    <a class="nav-link active" href="#" onclick="showSection('dashboard')">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                    <a class="nav-link" href="#" onclick="showSection('create-account')">
                        <i class="bi bi-person-plus"></i> Create Account
                    </a>
                    <a class="nav-link" href="#" onclick="showSection('update-account')">
                        <i class="bi bi-person-gear"></i> Update Account
                    </a>
                    <a class="nav-link" href="#" onclick="showSection('delete-account')">
                        <i class="bi bi-person-x"></i> Delete Account
                    </a>
                    <a class="nav-link" href="#" onclick="showSection('student-data')">
                        <i class="bi bi-people"></i> Student Data
                    </a>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10">
                <div class="main-content">

                    <!-- Dashboard Section -->
                    <div id="dashboard" class="content-section active">
                        <h1 class="page-title">
                            <i class="bi bi-speedometer2"></i> Account Dashboard
                        </h1>

                        <!-- Statistics Cards -->
                        <div class="row">
                            <div class="col-md-3">
                                <div class="stats-card">
                                    <div class="stats-number">124</div>
                                    <div class="text-muted">Total Accounts</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="stats-card">
                                    <div class="stats-number">98</div>
                                    <div class="text-muted">Active Accounts</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="stats-card">
                                    <div class="stats-number">26</div>
                                    <div class="text-muted">Inactive Accounts</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="stats-card">
                                    <div class="stats-number">12</div>
                                    <div class="text-muted">Today's Accounts</div>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Accounts Table -->
                        <div class="card">
                            <div class="card-header">
                                <i class="bi bi-people"></i> Recent Account Data
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
                                                <th>Date Created</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>001</td>
                                                <td>John Doe</td>
                                                <td>john@admin.com</td>
                                                <td>Admin</td>
                                                <td><span class="badge badge-success">Active</span></td>
                                                <td>2024-01-15</td>
                                            </tr>
                                            <tr>
                                                <td>002</td>
                                                <td>Jane Smith</td>
                                                <td>jane@student.com</td>
                                                <td>Student</td>
                                                <td><span class="badge badge-danger">Inctive</span></td>
                                                <td>2024-01-14</td>
                                            </tr>
                                            <tr>
                                                <td>003</td>
                                                <td>Bob Johnson</td>
                                                <td>bob@teacher.com</td>
                                                <td>Teacher</td>
                                                <td><span class="badge badge-success">Active</span></td>
                                                <td>2024-01-13</td>
                                            </tr>
                                            <tr>
                                                <td>004</td>
                                                <td>Alice Brown</td>
                                                <td>alice@student.com</td>
                                                <td>Student</td>
                                                <td><span class="badge badge-success">Active</span></td>
                                                <td>2024-01-12</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Create Account Section -->
                    <div id="create-account" class="content-section">
                        <h1 class="page-title">
                            <i class="bi bi-person-plus"></i> Create New Account
                        </h1>

                        <div class="card">
                            <div class="card-header">
                                <i class="bi bi-person-plus"></i> Account Information
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="fullName" class="form-label">Full Name</label>
                                                <input type="text" class="form-control" id="fullName" placeholder="Enter full name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email Address</label>
                                                <input type="email" class="form-control" id="email" placeholder="Enter email address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="role" class="form-label">Role</label>
                                                <select class="form-control" id="role">
                                                    <option value="">Select Role</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="teacher">Teacher</option>
                                                    <option value="student">Student</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Account Status</label>
                                                <select class="form-control" id="status">
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="password" placeholder="Enter password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm password">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-person-plus"></i> Create Account
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Update Account Section -->
                    <div id="update-account" class="content-section">
                        <h1 class="page-title">
                            <i class="bi bi-person-gear"></i> Update Account
                        </h1>

                        <div class="card">
                            <div class="card-header">
                                <i class="bi bi-search"></i> Search Account
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="Search by name or email..." id="searchAccount">
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-primary" onclick="searchAccount()">
                                            <i class="bi bi-search"></i> Search
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-4">
                            <div class="card-header">
                                <i class="bi bi-person-gear"></i> Update Account Information
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="updateFullName" class="form-label">Full Name</label>
                                                <input type="text" class="form-control" id="updateFullName" value="John Doe">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="updateEmail" class="form-label">Email Address</label>
                                                <input type="email" class="form-control" id="updateEmail" value="john@gmail.com">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="updateRole" class="form-label">Role</label>
                                                <select class="form-control" id="updateRole">
                                                    <option value="admin" selected>Admin</option>
                                                    <option value="teacher">Teacher</option>
                                                    <option value="student">Student</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="updateStatus" class="form-label">Account Status</label>
                                                <select class="form-control" id="updateStatus">
                                                    <option value="active" selected>Active</option>
                                                    <option value="inactive">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-warning">
                                        <i class="bi bi-pencil-square"></i> Update Account
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Account Section -->
                    <div id="delete-account" class="content-section">
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

                    <!-- Student Data Section -->
                    <div id="student-data" class="content-section">
                        <h1 class="page-title">
                            <i class="bi bi-people"></i> Student Data
                        </h1>

                        <div class="card">
                            <div class="card-header">
                                <i class="bi bi-funnel"></i> Filter by Class
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <select class="form-control" id="classFilter" onchange="filterByClass()">
                                            <option value="">All Classes</option>
                                            <option value="10A">Class 10A</option>
                                            <option value="10B">Class 10B</option>
                                            <option value="11A">Class 11A</option>
                                            <option value="11B">Class 11B</option>
                                            <option value="12A">Class 12A</option>
                                            <option value="12B">Class 12B</option>
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="Search student by name..." id="studentSearch" onkeyup="searchStudent()">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-4">
                            <div class="card-header">
                                <i class="bi bi-table"></i> Student Information & Activity Hours
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="studentTable">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Class</th>
                                                <th>Email</th>
                                                <th>Study Hours</th>
                                                <th>Sleep Hours</th>
                                                <th>Extracurricular Hours</th>
                                                <th>Physical Activity Hours</th>
                                                <th>Social Hours</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr data-class="10A">
                                                <td>Emma Wilson</td>
                                                <td>10A</td>
                                                <td>emma@student.edu</td>
                                                <td>8</td>
                                                <td>7</td>
                                                <td>2</td>
                                                <td>1.5</td>
                                                <td>3</td>
                                            </tr>
                                            <tr data-class="10A">
                                                <td>Michael Chen</td>
                                                <td>10A</td>
                                                <td>michael@student.edu</td>
                                                <td>7</td>
                                                <td>8</td>
                                                <td>3</td>
                                                <td>2</td>
                                                <td>2</td>
                                            </tr>
                                            <tr data-class="10B">
                                                <td>Sarah Davis</td>
                                                <td>10B</td>
                                                <td>sarah@student.edu</td>
                                                <td>6</td>
                                                <td>7.5</td>
                                                <td>2.5</td>
                                                <td>1</td>
                                                <td>4</td>
                                            </tr>
                                            <tr data-class="11A">
                                                <td>David Rodriguez</td>
                                                <td>11A</td>
                                                <td>david@student.edu</td>
                                                <td>9</td>
                                                <td>6</td>
                                                <td>1</td>
                                                <td>2.5</td>
                                                <td>2.5</td>
                                            </tr>
                                            <tr data-class="11B">
                                                <td>Lisa Thompson</td>
                                                <td>11B</td>
                                                <td>lisa@student.edu</td>
                                                <td>7.5</td>
                                                <td>7</td>
                                                <td>2</td>
                                                <td>1.5</td>
                                                <td>3</td>
                                            </tr>
                                            <tr data-class="12A">
                                                <td>James Anderson</td>
                                                <td>12A</td>
                                                <td>james@student.edu</td>
                                                <td>10</td>
                                                <td>6</td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>2</td>
                                            </tr>
                                            <tr data-class="12B">
                                                <td>Maria Garcia</td>
                                                <td>12B</td>
                                                <td>maria@student.edu</td>
                                                <td>8.5</td>
                                                <td>7</td>
                                                <td>1.5</td>
                                                <td>2</td>
                                                <td>2.5</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this account? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" onclick="confirmDelete()">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="js/scriptDashboard.js"></script>
</body>
</html>
