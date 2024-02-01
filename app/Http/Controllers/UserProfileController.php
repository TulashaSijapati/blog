<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserProfileController extends Controller
{
    public function index()
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Pass the user data to the view
        return view('user.profile', compact('user'));
    }
}
