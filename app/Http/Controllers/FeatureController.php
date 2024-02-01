<?php

namespace App\Http\Controllers;
// Example import statement in FeatureController
use App\Models\Feature;

use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function create()
    {
        return view('features.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Add any other validation rules for features
        ]);

        Feature::create([
            'name' => $request->name,
            // Add any other fields you may need for features
        ]);

        return redirect()->route('blog.create')->with('success', 'Feature created successfully!');
    }
}
