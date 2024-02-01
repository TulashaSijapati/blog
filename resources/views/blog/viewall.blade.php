<!-- resources/views/blog/viewall.blade.php -->
@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h2>All Blog Posts</h2>

        <!-- Display success message if available -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Feature</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogs as $blog)
                    <tr>
                        <td>
                            <span class="blog-title" data-blog-id="{{ $blog->id }}">{{ $blog->title }}</span>
                            <div class="blog-details" style="display: none;" data-blog-id="{{ $blog->id }}">
                                <p><strong>Content:</strong> {{ $blog->content }}</p>
                                <p><strong>Message:</strong> {{ $blog->message }}</p>
                                <p><strong>Mobile Number:</strong> {{ $blog->mobile_number }}</p>
                                <p><strong>Image:</strong>
                                    @if($blog->image)
                                        <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" class="rounded mx-auto d-block" style="max-width: 300px; max-height: 200px;">
                                    @else
                                        <!-- Use a placeholder image or icon -->
                                        <img src="{{ asset('path-to-placeholder-image.jpg') }}" alt="Placeholder" style="max-width: 50px;" class="img-thumbnail img-fluid">
                                    @endif
                                </p>
                            </div>
                        </td>
                        <td>
                            @if($blog->feature)
                                {{ $blog->feature->name }}
                            @else
                                No Feature
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('blog.edit', ['id' => $blog->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form id="deleteForm{{ $blog->id }}" action="{{ route('blog.destroy', ['id' => $blog->id]) }}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ $blog->id }}')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        // Set a global variable with the base URL for the blog.show route
        window.blogShowUrl = "{{ route('blog.show', ['id' => ':id']) }}";

    </script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var blogTitles = document.getElementsByClassName("blog-title");

        Array.from(blogTitles).forEach(function(title) {
            title.addEventListener("click", function() {
                var blogId = this.getAttribute("data-blog-id");

                // Check if the blogId is not null or undefined
                if (blogId) {
                    window.location.href = window.blogShowUrl.replace(':id', blogId);
                } else {
                    console.error("Blog ID is missing or invalid.");
                }
            });
        });
    });

    function confirmDelete(blogId) {
        var confirmDelete = confirm('Are you sure you want to delete this blog post?');

        if (confirmDelete) {
            document.getElementById('deleteForm' + blogId).submit();
        }
    }
</script>

    </script>
@endsection
