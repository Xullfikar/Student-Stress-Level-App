@extends('teacher.layouts');

@section('content')
    <!-- Detail Page -->
    <div id="detail-page">
        <h1 class="page-title">
            <i class="fas fa-chart-line me-3"></i>
            Detailed Student Analysis
        </h1>
        <!-- Filters -->
        <div class="row mb-4">
            <div class="col-md-6">
                <label for="classFilter" class="form-label">Filter by Class:</label>
                <select class="form-control" id="classFilter" onchange="filterStudents()" style="height: 55px">
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
                <select class="form-control" id="stressFilter" onchange="filterStudents()" style="height: 55px">
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
                                    <td>{{ $student->student->fullName }}</td>
                                    <td>{{ $student->class }}</td>
                                    <td>{{ $student->study_hours_per_day }}</td>
                                    <td>{{ $student->sleep_hours_per_day }} </td>
                                    <td>{{ $student->extracurricular_hours }}</td>
                                    <td>{{ $student->physical_activity_hours }}</td>
                                    <td>{{ $student->social_activity_hours }}</td>
                                    @if ($student->stress_level == 'low')
                                        <td><span class="badge badge-success">{{ $student->stress_level }}</span></td>
                                    @endif
                                    @if ($student->stress_level == 'moderate')
                                        <td><span class="badge badge-warning">{{ $student->stress_level }}</span></td>
                                    @endif
                                    @if ($student->stress_level == 'high')
                                        <td><span class="badge badge-danger">{{ $student->stress_level }}</span></td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $students->links() }}
            </div>
        </div>
    </div>
@endsection
