<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Student Stress Monitor</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styleDashboard.css') }}">
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
                    <a class="nav-link {{ request()->is('admin') ? 'active' : ''}}" href="/admin">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                    <a class="nav-link {{ request()->is('admin/create') ? 'active' : ''}}" href="/admin/create">
                        <i class="bi bi-person-plus"></i> Create Account
                    </a>
                    <a class="nav-link {{ request()->is('admin/manage') ? 'active' : ''}}" href="/admin/manage">
                        <i class="bi bi-person-x"></i> Manage Account
                    </a>
                    <a class="nav-link {{ request()->is('admin/students') ? 'active' : ''}}" href="/admin/students">
                        <i class="bi bi-people"></i> Student Data
                    </a>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="nav-link w-100 text-start">
                            <i class="bi bi-door-open"></i> Logout
                        </button>
                    </form>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- <script src="../js/scriptDashboard.js"></script> -->
</body>
</html>
