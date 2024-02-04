<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobType;
use App\Models\Category;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class OpenJobController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::orderBy('name', 'ASC')->where('status', 1)->get();
        $jobTypes = JobType::orderBy('name', 'ASC')->where('status', 1)->get();
        $jobs = Job::where('status', 1);
        //search query for search jobs by title and keywords
        if (!empty($request->keywords)) {
            $jobs = $jobs->where(function ($query) use ($request) {
                $query->orWhere('title', 'like', '%' . $request->keywords . '%');
                $query->orWhere('keywords', 'like', '%' . $request->keywords . '%');
            });
        }
        //search query for search jobs by location
        if (!empty($request->location)) {
            $jobs = $jobs->where('location', $request->location);
        }

        //search query for search jobs by category
        if (!empty($request->category)) {
            $jobs = $jobs->where('category_id', $request->category);
        }
        //search query for jobs by job type job type will be multiple like 1,2,3,4
        if (!empty($request->jobType)) {
            $jobTypesArray = $request->input('jobType', []);
            $jobs = $jobs->whereIn('job_type_id', $jobTypesArray);
        }
        //search query for search jobs by experience
        if (!empty($request->experience)) {
            $jobs = $jobs->where('experience', $request->experience);
        }
        $jobs = $jobs->with(['category', 'jobType'])->orderBy('created_at', 'desc')->paginate(9);

        return view('jobs', compact('categories', 'jobTypes', 'jobs'));
    }

    //single job details
    public function show($id)
    {
        $job = Job::where([
            'id' => $id,
            'status' => 1
        ])->with(['category', 'jobType'])->first();

        if ($job == null) {
            abort(404);
        }

        //show applicants
        $applicants = JobApplication::where('job_id', $id)->with('user')->get();
        // dd($applicants);
        return view('job-details', compact('job', 'applicants'));
    }
}
