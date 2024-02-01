<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $blogs = Blog::all();
        $titleCount = count($blogs);

        // Count the number of non-empty 'content' fields
        $contentCount = $blogs->filter(function ($blog) {
            return !empty($blog->content);
        })->count();

        // Count the number of non-empty 'image' fields
        $imageCount = $blogs->filter(function ($blog) {
            return $blog->image != null;
        })->count();

        return view('dashboard.index', compact('blogs', 'titleCount', 'contentCount', 'imageCount'));
    }
}
