@extends('backend.app')
@section('title', 'Dashboard')
@section('content')
    <main class="content">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card shadow-lg border-0">
                        <div class="container">
                            <h2>Add Course</h2>

                            <form action="{{ route('add.course') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- Course Name --}}
                                <div class="mb-3">
                                    <label for="name" class="form-label">Course Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}" required>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Thumbnail --}}
                                <div class="mb-3">
                                    <label for="thumbnail" class="form-label">Course Thumbnail</label><br>
                                    <input type="file" class="form-control" id="thumbnail" name="image">
                                </div>

                                {{-- Course description --}}
                                <div class="mb-3">
                                    <label for="description" class="form-label">Course description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                                </div>

                                {{-- duration --}}
                                <div class="mb-3">
                                    <label for="duration" class="form-label">Duration (in years) </label>
                                    <input type="number" class="form-control" id="duration" name="duration"
                                        value="{{ old('duration') }}" placeholder="e.g. 3" required>
                                </div>

                                {{-- Fees --}}
                                <div class="mb-3">
                                    <label for="fees" class="form-label">Course Fees (in lakh)</label>
                                    <input type="number" class="form-control" id="fees" name="fees"
                                        value="{{ old('fees') }}" placeholder="e.g. 2" required>
                                </div>

                                <button type="submit" class="btn btn-success">Add Course</button>
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
