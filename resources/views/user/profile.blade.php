<!-- resources/views/user/profile.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">
                <h1>User Profile</h1>
            </div>
            <div class="card-body">
                <!-- Display user profile information here -->
                <p>Name: {{ $user->name }}</p>
                <p>Email: {{ $user->email }}</p>
                <!-- Add other user profile information as needed -->
            </div>
        </div>
    </div>
@endsection
