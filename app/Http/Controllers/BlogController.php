<?php

namespace App\Http\Controllers;
use App\Models\Feature;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
class BlogController extends Controller
{

    public function showCreateForm()
    {
        $features = Feature::all();
        return view('blog.create', compact('features'));
    }
    

    public function store(Request $request)
{
    // Validate the form data
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'message' => 'required|string',
        'mobile_number' => 'required|regex:/^[0-9]{10}$/',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image upload
        'feature_id' => 'required|exists:features,id', // Validate existence of the feature_id in the features table
    ]);

    // Save data to the database using the Blog model
    $blog = Blog::create([
        'title' => $request->title,
        'content' => $request->content,
        'message' => $request->message,
        'mobile_number' => $request->mobile_number,
        'feature_id' => $request->feature_id,
    ]);

    // Handle image upload
    if ($request->hasFile('image')) {
        // Store the image in the 'public' disk under the 'blog_images' directory
        $imagePath = $request->file('image')->store('blog_images', 'public');
        
        // Save the image path to the 'image' column in the database
    $blog->image = $imagePath;
    $blog->save();
    }
    return redirect()->route('blog.create')->with('success', 'Form submitted successfully!');
}


public function viewAll()
    {
        $blogs = Blog::with('feature')->get(); // Load features along with blog posts
    $features = Feature::all();

    return view('blog.viewall', compact('blogs', 'features'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $features = Feature::all(); // Retrieve features
        return view('blog.edit', compact('blog', 'features'));

    }
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        // Validate and update the data
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'message' => 'required|string',
            'mobile_number' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image upload
        ]);

        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'message' => $request->message,
            'mobile_number' => $request->mobile_number,
            
        ]);

        if ($request->hasFile('image')) {
            // Delete the previous image if exists
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }

            $imagePath = $request->file('image')->store('blog_images', 'public');
    $blog->image = $imagePath;
    $blog->save();
        }

        return redirect()->route('blog.viewall')->with('success', 'Blog post updated successfully!');
    }

   
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        // Delete the associated image
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return redirect()->route('blog.viewall')->with('success', 'Blog post deleted successfully!');
    }

// app/Http/Controllers/BlogController.php
public function show($id)
{
    $blog = Blog::findOrFail($id);
    return view('blog.show', compact('blog'));
}





    
}
