<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - Student Stress Monitor</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styleStudent.css') }}">
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
                    <a class="nav-link {{ request()->is('student/') ? 'active' : ''}}" href="/student">
                        <i class="fas fa-home me-2"></i>
                        Home
                    </a>
                    <a class="nav-link {{ request()->is('student/create') ? 'active' : ''}}" href="/student/create">
                        <i class="fas fa-edit me-2"></i>
                        Schedule Data
                    </a>
                    <a class="nav-link {{ request()->is('student/profile') ? 'active' : ''}}" href="/student/profile">
                        <i class="fas fa-user me-2"></i>
                        Profile
                    </a>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="nav-link w-100 text-start">
                            <i class="bi bi-door-open-fill"></i> Logout
                        </button>
                    </form>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10">
                <div class="main-content">
                    @yield("content")
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="js/scriptStudent.js"></script> -->
</body>
</html>
