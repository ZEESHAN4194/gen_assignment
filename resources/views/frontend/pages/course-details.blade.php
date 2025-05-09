@extends('frontend.app')
@section('title', 'Course Details')
@section('content')
    <section>
        <div class="container min-vh-100 d-flex align-items-center justify-content-center">
            <div class="bg-white p-4 rounded shadow w-100" style="max-width: 600px; border: 1px solid #ddd;">
                <h1 class="text-center mb-4" style="color: #007bff; font-weight: bold;">Course Details</h1>

                <div class="mb-4">
                    <h2 class="h5" style="color: #333;">{{ $course->name }}</h2>
                    <img src="{{ asset('uploads/courses/' . $course->thumbnail) }}" alt="{{ $course->name }}"
                        class="img-fluid rounded my-3" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <p class="text-muted" style="line-height: 1.6;">{{ $course->description }}</p>
                    <p class="h6 mt-2" style="color: #28a745;">
                        Fees: {{ $course?->fees ? number_format($course->fees, 2) . ' Lakh' : 'N/A' }}
                    </p>
                </div>

                <form method="POST" action="{{ route('registration.confirm') }}">
                    @csrf
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('home') }}" class="btn btn-outline-secondary"
                            style="padding: 10px 20px; font-size: 14px;">Change Course</a>
                        <button type="submit" class="btn btn-primary" style="padding: 10px 20px; font-size: 14px;">Buy
                            Now</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
