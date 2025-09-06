@extends('student.layouts');

@section('content')
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
@endsection
