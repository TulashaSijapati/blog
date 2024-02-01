<!-- resources/views/blog/create.blade.php -->
@extends('layouts.master')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mt-4">
        <h2>Create a New Blog Post</h2>

        <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data" class="small-width-form">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control form-control-sm" id="title" name="title" required>
                    </div>

                    <div class="form-group">
                        <label for="content">Content:</label>
                        <!-- Replace input with textarea for TinyMCE -->
                        <textarea class="form-control tinymce" id="content" name="content" rows="3" required></textarea>
                    </div>

                </div>

                <div class="col-md-6">
                    <a href="{{ route('features.create') }}" class="btn btn-primary">Create new Features</a>

                    <div class="form-group">
                        <label for="feature">{{ __('Feature') }}</label>
                        <select class="form-control form-control-sm" id="feature" name="feature_id" required>
                            <option value="" disabled selected>Select a feature</option>
                            @foreach ($features as $feature)
                                <option value="{{ $feature->id }}">{{ $feature->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control form-control-sm" id="message" name="message" rows="2" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="mobile_number">Mobile Number:</label>
                        <input type="text" class="form-control form-control-sm" id="mobile_number" name="mobile_number" required>
                    </div>

                    <div class="form-group">
                        <label for="image">{{ __('Image') }}</label>
                        <input type="file" class="form-control-file form-control-sm" id="image" name="image" accept="image/*" required>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-sm" id="submitBtn">Submit</button>
        </form>
    </div>

    <!-- Add this script at the bottom of your blade file, after the form -->
    <script>
        // JavaScript to initialize TinyMCE
        document.addEventListener('DOMContentLoaded', function () {
            tinymce.init({
                selector: '.tinymce', // Class name of your TinyMCE-enabled textarea
                height: 200, // Adjust the height as needed
                plugins: 'autolink lists link image charmap print preview hr anchor pagebreak',
                toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
            });
        });

        // Handle form submission
        document.getElementById('submitBtn').addEventListener('click', function () {
            // Update TinyMCE content before form submission
            tinymce.triggerSave();
        });
    </script>
@endsection
