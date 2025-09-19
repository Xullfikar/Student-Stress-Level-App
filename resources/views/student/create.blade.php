@extends('student.layouts');

@section('content')

<!-- Data Input Page -->
<div>
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
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('student.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Class</label>
                            <input type="text" class="form-control @error('class') is-invalid @enderror" id="studentClass" name="class" value="{{ old('class') }}">
                            @error('class')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">GPA</label>
                            <input type="number" class="form-control @error('gpa') is-invalid @enderror" id="studentGPA" step="0.01" min="0" max="4" name="gpa" value="{{ old('gpa') }}">
                            @error('gpa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Study Hours (per day)</label>
                            <input type="number" class="form-control @error('study_hours_per_day') is-invalid @enderror" id="studyHours" min="0" max="24" step="0.01" name="study_hours_per_day">
                            @error('study_hours_per_day')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Sleep Hours (per day)</label>
                            <input type="number" class="form-control  @error('sleep_hours_per_day') is-invalid @enderror" id="sleepHours" min="0" max="24" step="0.01" name="sleep_hours_per_day">
                            @error('sleep_hours_per_day')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Extracurricular Hours</label>
                            <input type="number" class="form-control @error('extracurricular_hours') is-invalid @enderror" id="extracurricularHours" min="0" max="24" step="0.01" name="extracurricular_hours">
                            @error('extracurricular_hours')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Physical Activity Hours</label>
                            <input type="number" class="form-control @error('physical_activity_hours') is-invalid @enderror" id="physicalHours" min="0" max="24" step="0.01" name="physical_activity_hours">
                            @error('physical_activity_hours')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Social Activity Hours</label>
                            <input type="number" class="form-control @error('social_activity_hours') is-invalid @enderror" id="socialHours" min="0" max="24" step="0.01"
                            name="social_activity_hours">
                            @error('social_activity_hours')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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
    <div class="card mt-4" id="summaryCard">
        <div class="card-header">
            <h4 class="mb-0">
                <i class="fas fa-chart-pie me-2"></i>
                Latest Schedule Summary
            </h4>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-2">
                    <div class="text-center">
                        <i class="fas fa-book fa-2x mb-2" style="color: var(--accent-purple);"></i>
                        <h6>Study</h6>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="text-center">
                        <i class="fas fa-bed fa-2x mb-2" style="color: var(--accent-cyan);"></i>
                        <h6>Sleep</h6>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="text-center">
                        <i class="fas fa-users fa-2x mb-2" style="color: var(--accent-purple);"></i>
                        <h6>Extracurricular</h6>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="text-center">
                        <i class="fas fa-running fa-2x mb-2" style="color: var(--accent-cyan);"></i>
                        <h6>Physical</h6>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="text-center">
                        <i class="fas fa-comments fa-2x mb-2" style="color: var(--accent-purple);"></i>
                        <h6>Social</h6>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="text-center">
                        <i class="fas fa-clock fa-2x mb-2" style="color: var(--accent-cyan);"></i>
                        <h6>Total</h6>
                    </div>
                </div>
                @foreach ($datas as $data)
                    <div class="col-md-2">
                        <div class="text-center">
                            <span class="stats-number" style="font-size: 1.5rem;">{{ $data->study_hours_per_day }}</span>
                        </div>
                    </div>
                        <div class="col-md-2">
                        <div class="text-center">
                            <span class="stats-number" style="font-size: 1.5rem;">{{ $data->sleep_hours_per_day }}</span>
                        </div>
                    </div>
                        <div class="col-md-2">
                        <div class="text-center">
                            <span class="stats-number" style="font-size: 1.5rem;">{{ $data->extracurricular_hours }}</span>
                        </div>
                    </div>
                        <div class="col-md-2">
                        <div class="text-center">
                            <span class="stats-number" style="font-size: 1.5rem;">{{ $data->physical_activity_hours }}</span>
                        </div>
                    </div>
                        <div class="col-md-2">
                        <div class="text-center">
                            <span class="stats-number" style="font-size: 1.5rem;">{{ $data->social_activity_hours }}</span>
                        </div>
                    </div>
                        <div class="col-md-2">
                        <div class="text-center">
                            <span class="stats-number" style="font-size: 1.5rem;">{{ $data->study_hours_per_day + $data->sleep_hours_per_day + $data->extracurricular_hours + $data->physical_activity_hours +  $data->social_activity_hours }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $datas->links() }}
        </div>
    </div>
@endsection
