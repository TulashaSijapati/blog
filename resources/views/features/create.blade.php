<!-- resources/views/features/create.blade.php -->

@extends('layouts.master')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mt-4">
        <h2>Create a New Feature</h2>

        <form action="{{ route('features.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="name">Feature Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <!-- Add other fields if needed -->

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
