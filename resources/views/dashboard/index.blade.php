<!-- resources/views/dashboard/index.blade.php -->
@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Display count of titles -->
        <h2>Blog Post Counts</h2>
        <ul class="list-unstyled">
            <li><strong>Number of Titles:</strong> {{ $titleCount }}</li>
        </ul>

        <!-- Display viewall contents here -->
        <h2>All Blog Posts</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogs as $blog)
                    <tr>
                        <td>{{ $blog->title }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
