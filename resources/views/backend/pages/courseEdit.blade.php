@extends('backend.app')
@section('title', 'Dashboard')
@section('content')
    <main class="content">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card shadow-lg border-0">
                        <div class="container">
                            <h2>Edit Course</h2>
                        
                            <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- Course Name --}}
                                <div class="mb-3">
                                    <label for="name" class="form-label">Course Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $course->name) }}" required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                        
                                {{-- Thumbnail --}}
                                <div class="mb-3">
                                    <label for="thumbnail" class="form-label">Course Thumbnail</label><br>
                                    @if($course->thumbnail)
                                        <img src="{{ asset('uploads/courses/' . $course->thumbnail) }}" alt="Thumbnail" width="120" class="mb-2">
                                    @endif
                                    <input type="file" class="form-control" id="thumbnail" name="image">
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                        
                                {{-- Course description --}}
                                <div class="mb-3">
                                    <label for="description" class="form-label">Course description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description',$course->description) }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                {{-- Duration --}}
                                <div class="mb-3">
                                    <label for="duration" class="form-label">Course duration (in years)</label>
                                    <input type="number" class="form-control" id="duration" name="duration" value="{{ old('duration', $course->duration) }}"  placeholder="e.g. 2" required>
                                    @error('duration')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                        
                                {{-- Fees --}}
                                {{-- @dd($course->fees) --}}
                                <div class="mb-3">
                                    <label for="fees" class="form-label">Course Fees (in lakh)</label>
                                    <input type="number" class="form-control" id="fees" name="fees" value="{{ old('fees', $course->fees) }}" placeholder="e.g. 2" required>
                                    @error('fees')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                        
                                <button type="submit" class="btn btn-success">Update Course</button>
                                <a href="" class="btn btn-secondary">Cancel</a>
                            </form>
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
