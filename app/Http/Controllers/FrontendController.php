<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function welcome()
    {
        // Retrieve data for the welcome page
        $titleCount = Blog::count(); // Count of all blog posts
        $blogs = Blog::all(); // Retrieve all blog posts

        // Pass data to the welcome view
        return view('welcome', compact('titleCount', 'blogs'));
    }
    public function showBlogDetails($id)
    {
        $blog = Blog::find($id);

        return view('blog.details', compact('blog'));
    }
}
