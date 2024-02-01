<!-- resources/views/blog/show.blade.php -->
@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Blog Details</h2>

        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="container">
                    <h5 class="mb-3">Title: {{ $blog->title }}</h5>
                    <!-- Other details can be placed in a table -->
                    <table class="table">
                    <tr>
                            <td><strong>Content:</strong></td>
                            <td>
                                <div id="summernote">{!! $blog->content !!}</div>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Message:</strong></td>
                            <td>{{ $blog->message }}</td>
                        </tr>
                        <tr>
                            <td><strong>Mobile Number:</strong></td>
                            <td>{{ $blog->mobile_number }}</td>
                        </tr>
                        <tr>
                            <td><strong>Feature:</strong></td>
                            <td>{{ optional($blog->feature)->name ?: 'No Feature' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="container">
                    <h5 class="mb-3">Image:</h5>
                    @if($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" class="img-fluid" style="max-width: 200px; max-height: 150px;">
                    @else
                        <!-- Use a placeholder image or icon -->
                        <img src="{{ asset('path-to-placeholder-image.jpg') }}" alt="Placeholder" class="img-thumbnail img-fluid" style="max-width: 50px;">
                    @endif
                </div>
            </div>
        </div>

        <!-- "Go Back" button -->
        <a href="{{ URL::previous() }}" class="btn btn-primary mt-3">Go Back</a>
    </div>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview']],
                ],
            });
        });
    </script>
@endsection
