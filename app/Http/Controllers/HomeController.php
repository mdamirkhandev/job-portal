<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public  function index()
    {
        $categories = Category::where('status', 1)->orderBy('name', 'asc')->take(8)->get();
        $featured_jobs = Job::where('status', 1)->where('isFeatured', 1)->orderBy('title', 'asc')->take(6)->get();
        $latest_jobs = Job::where('status', 1)->orderBy('created_at', 'desc')->take(6)->get();
        return view('home', compact('categories', 'featured_jobs', 'latest_jobs'));
    }
}
