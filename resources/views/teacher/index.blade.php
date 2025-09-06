@extends('teacher.layouts');

@section('content')
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
                    <div class="stats-number text-danger">{{ $totalHigh }}</div>
                    <h5>High Stress Students</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-card text-center">
                    <div class="stats-number text-warning">{{ $totalModerate }}</div>
                    <h5>Moderate Stress Students</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-card text-center">
                    <div class="stats-number text-success">{{ $totalLow }}</div>
                    <h5>Low Stress Students</h5>
                </div>
            </div>
        </div>

        <!-- Students Grid -->
        <div class="row" id="students-grid">
            <!-- Student cards will be generated here -->
        </div>
    </div>
@endsection
