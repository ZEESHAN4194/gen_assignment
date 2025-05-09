@extends('frontend.app')

@section('title', 'Course Registration')

@section('content')
<section class="bg-light py-5">
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-secondary text-white text-center py-3">
                        <h2 class="mb-0">Course Registration</h2>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('frontend.registration.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="first_name" class="form-label fw-bold">First Name</label>
                                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first_name" value="{{ old('first_name', session('registration_data.first_name')) }}" required>
                                @error('first_name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="last_name" class="form-label fw-bold">Last Name</label>
                                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="last_name" value="{{ old('last_name', session('registration_data.last_name')) }}" required>
                                @error('last_name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">Email ID</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email', session('registration_data.email')) }}" required>
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label fw-bold">Phone Number</label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ old('phone', session('registration_data.phone')) }}" required>
                                @error('phone')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="course" class="form-label fw-bold">Select Course</label>
                                <select name="course_id" class="form-control @error('course_id') is-invalid @enderror" id="course" required>
                                    <option value="" disabled {{ !old('course_id', session('registration_data.course_id')) ? 'selected' : '' }}>Select a course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}" {{ old('course_id', session('registration_data.course_id')) == $course->id ? 'selected' : '' }}>
                                            {{ $course->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-secondary btn-lg">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center text-muted">
                        <small>All fields are mandatory</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
