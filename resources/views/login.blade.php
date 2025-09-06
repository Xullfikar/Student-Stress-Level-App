<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Panel</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styleLogin.css">
</head>
<body>
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="login-container">
        <!-- Login Card -->
        <div class="login-card">
            <div class="login-header">
                <h2>Welcome Back</h2>
                <p>Please sign in to your account</p>
            </div>
            <!-- @session('failed') -->
            @if (session('failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('failed') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <!-- @endsession -->
            <form action="/login" method="POST">
                @csrf
                <div class="form-floating">
                    <input name="email" type="email" class="form-control" id="username" placeholder="name@example.com" required>
                    <label for="email"><i class="fas fa-envelope me-2"></i>Email Address</label>
                </div>

                <div class="form-floating">
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password"><i class="fas fa-lock me-2"></i>Password</label>
                </div>

                <button type="submit" class="btn btn-login">
                    <i class="fas fa-sign-in-alt me-2"></i>
                    Sign In
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="scriptLogin.js"></script> -->
</body>
</html>
