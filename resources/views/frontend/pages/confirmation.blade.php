@extends('frontend.app')
@section('title', 'Course Confirmation')

@section('content')
    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">Confirm Your Enrollment</h2>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <h5 class="text-secondary">Student Information</h5>
                    <ul class="list-unstyled">
                        <li><strong>Name:</strong> {{ $data['first_name'] }} {{ $data['last_name'] }}</li>
                        <li><strong>Email:</strong> {{ $data['email'] }}</li>
                        <li><strong>Mobile:</strong> {{ $data['phone'] }}</li>
                    </ul>
                </div>

                <div class="mb-4">
                    <h5 class="text-secondary">Selected Course</h5>
                    <ul class="list-unstyled">
                        <li><strong>Course Name:</strong> {{ $course->name }}</li>
                        <li>
                            <strong>Fees:</strong>
                            {{ $course?->fees ? number_format($course->fees, 2) . ' Lakh' : 'N/A' }}
                        </li>
                    </ul>
                </div>

                <form method="POST" action="{{ route('registration.submit') }}">
                    @csrf
                    <div class="text-center">
                        <button type="submit" class="btn btn-success btn-lg px-5">Confirm & Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
