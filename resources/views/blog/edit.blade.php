<!-- resources/views/blog/edit.blade.php -->
@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h2>Edit Blog Post</h2>

        <!-- Display success message if available -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('blog.update', ['id' => $blog->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Use PUT method for updates -->

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}" required>
            </div>

            <div class="form-group">
                <label for="content">Content:</label>
                <!-- Add tinymce class to enable TinyMCE -->
                <textarea class="form-control tinymce" id="content" name="content" rows="5" required>{{ $blog->content }}</textarea>
            </div>

            <div class="form-group">
                <label for="feature_id">Feature:</label>
                <select class="form-control" id="feature_id" name="feature_id" required>
                    @foreach($features as $feature)
                        <option value="{{ $feature->id }}" @if($feature->id == $blog->feature_id) selected @endif>{{ $feature->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="message">Message:</label>
                <textarea class="form-control" id="message" name="message" rows="3" required>{{ $blog->message }}</textarea>
            </div>

            <div class="form-group">
                <label for="mobile_number">Mobile Number:</label>
                <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="{{ $blog->mobile_number }}" required>
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                @if($blog->image)
                    <img src="{{ Storage::url('blog_images/' . $blog->image) }}" alt="Blog Image" style="max-width: 100px;">
                @endif
                <input type="file" class="form-control" id="image" name="image">
                <small class="form-text text-muted">Choose a new image if you want to update the existing one.</small>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            tinymce.init({
                selector: '.tinymce',
                height: 400, // Adjust the height as needed
                plugins: 'autolink lists link image charmap print preview hr anchor pagebreak',
                toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
            });
        });
    </script>
@endsection
