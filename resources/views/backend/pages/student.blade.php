@extends('backend.app')
@section('title', 'Dashboard')
@section('content')
    <main class="content">

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card shadow-lg border-0">
                        <div
                            class="card-header bg-secondary text-white py-3 d-flex justify-content-between align-items-center">
                            <h2 class="mb-0">Register Student</h2>
                            <a href="{{ route('students.export') }}" class="btn btn-light btn-sm text-success shadow-sm">
                                📤 Export CSV
                            </a>
                        </div>
                        <div class="card-body">
                            @if ($students->count())
                                <table id="coursesTable" class="table table-hover table-striped table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>S.no</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Course</th>
                                            <th>Fees</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($students as $student)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->email }}</td>
                                                <td>{{ $student->phone ?? 'N/A' }}</td>
                                                <td>{{ $student->course->name ?? 'N/A' }}</td>
                                                <td>
                                                    {{ optional($student->course)->fees ? number_format($student->course->fees, 2) . ' Lakh' : 'N/A' }}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted">No courses available</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            @else
                                <div class="text-center text-muted py-5">
                                    <h5>No Student Register</h5>
                                </div>
                            @endif

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
