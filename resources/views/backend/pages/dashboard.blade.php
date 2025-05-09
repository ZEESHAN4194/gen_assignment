@extends('backend.app')
@section('title', 'Dashboard')
@section('content')
    <main class="content">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card shadow-lg border-0">
                        <div class="card-header bg-secondary text-white text-center py-3">
                            <h2 class="mb-0 font-weight-bold">Dashboard Overview</h2>
                        </div>
                        <div class="card-body bg-light">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <a href="{{ route('course.master') }}" class="text-decoration-none">
                                        <div class="card text-center border-0 shadow-sm">
                                            <div class="card-body">
                                                <h5 class="card-title text-uppercase text-muted">Total Courses</h5>
                                                <p class="card-text display-4 text-primary font-weight-bold">{{ $totalCourses }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                
                                <div class="col-md-6">
                                    <a href="{{ route('students.index') }}" class="text-decoration-none">
                                        <div class="card text-center border-0 shadow-sm">
                                            <div class="card-body">
                                                <h5 class="card-title text-uppercase text-muted">Total Student Registrations</h5>
                                                <p class="card-text display-4 text-success font-weight-bold">{{ $totalStudents }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
