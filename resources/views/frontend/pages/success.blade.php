@extends('frontend.app')
@section('title', 'Course Details')

@section('content')
    <div class="container text-center py-5">
        <div class="card shadow-lg border-0">
            <div class="card-body">
                <h4 class="mb-2">🎉 Thank You for Registering!</h4>
                <p>You have successfully enrolled in <strong>{{ $course->name }}</strong>.</p>
                <p>We've sent a confirmation to your email: <strong>{{ $student->email }}</strong>.</p>
                <hr>
                <p class="mb-0">We look forward to seeing you in class. Stay tuned for updates!</p>
                <a href="{{ route('home') }}" class="btn btn-primary btn-lg mt-4">Back to Home</a>
            </div>
        </div>
    </div>
@endsection
