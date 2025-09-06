<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard - Student Stress Monitor</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styleTeacher.css') }}">
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
                            <a class="nav-link {{ request()->is('teacher') ? 'active' : ''}}" href="{{ route('teacher.dashboard') }}">
                                <i class="fas fa-tachometer-alt me-2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  {{ request()->is('teacher/detail-analysis') ? 'active' : ''}}" href="{{ route('teacher.view-detail') }}">
                                <i class="fas fa-chart-line me-2"></i>
                                Detail Analysis
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('teacher/profile') ? 'active' : ''}}" href="{{ route('teacher.profile') }}">
                                <i class="fas fa-user me-2"></i>
                                Profile
                            </a>
                        </li>
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="nav-link w-100 text-start">
                                    <i class="bi bi-door-open-fill"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10">
                <div class="main-content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="js/scriptTeacher.js"></script> -->
</body>
</html>
