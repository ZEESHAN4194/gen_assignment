@extends('backend.app')
@section('title', 'Dashboard')
@section('content')
    <main class="content">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card shadow-lg border-0">
                        <div class="card-header bg-secondary text-white py-3 d-flex justify-content-between align-items-center">
                            <h2 class="mb-0">All courses</h2>
                            <a href="{{ route('add.course') }}" class="btn btn-light btn-sm text-success shadow-sm">
                                <i class="fas fa-plus"></i> Add Course
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="coursesTable" class="table table-hover table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Course Name</th>
                                        <th>Description</th>
                                        <th>Fees</th>
                                        <th>Duration</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($courses as $course)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $course->name }}</td>
                                            <td>{{ Str::limit($course->description, 30) }}</td>
                                            <td>{{ $course->duration }} years</td>
                                            <td>{{ $course->fees }} lakh</td>
                                            <td>
                                                <img src="{{ asset('uploads/courses/' . $course->thumbnail) }}" alt="Course Image" width="70" height="70">
                                            </td>
                                            <td>
                                                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                                                <form action="{{ route('course.delete', $course->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this course?');">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted">No courses available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer text-center bg-light">
                            {{-- <small class="text-muted">Last updated: {{ now()->format('Y-m-d H:i:s') }}</small> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
