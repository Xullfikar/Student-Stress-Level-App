@extends('admin.layouts');

@section('content');
    <!-- Student Data Section -->
    <div id="student-data" class="content-section active">
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
                            @foreach ($students as $student)
                                <tr data-class="10A">
                                    <td>{{ $student->student->fullName }}</td>
                                    <td>{{ $student->class }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->study_hours_per_day }}</td>
                                    <td>{{ $student->sleep_hours_per_day }}</td>
                                    <td>{{ $student->extracurricular_hours }}</td>
                                    <td>{{ $student->physical_activity_hours }}</td>
                                    <td>{{ $student->social_activity_hours }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $students->links() }}
            </div>
        </div>
@endsection
