<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Mail\JobNotificationEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class JobApplicationController extends Controller
{
    //
    public function applyJob(Request $request)
    {
        $id = $request->id;
        $job = Job::where('id', $id)->first();
        //if job not found in db
        if (!$job) {
            session()->flash('error', 'Job not found');
            return response()->json([
                'status' => false,
                'error' => 'Job not found'
            ]);
        }

        //if employer want to apply for his own job
        $employer_id = $job->user_id;

        if ($employer_id == auth()->user()->id) {
            session()->flash('error', 'You can not apply for your own job');
            return response()->json([
                'status' => false,
                'error' => 'You can not apply for your own job'
            ]);
        }
        //can not apply for job if already applied
        $jobApplication = JobApplication::where('user_id', auth()->user()->id)
            ->where('job_id', $id)
            ->count();

        if ($jobApplication > 0) {
            session()->flash('error', 'You already applied for this job');
            return response()->json([
                'status' => false,
                'error' => 'You already applied for this job'
            ]);
        }

        $jobApplication = new JobApplication();
        $jobApplication->job_id = $job->id;
        $jobApplication->user_id = auth()->user()->id;
        $jobApplication->employer_id = $job->user_id;
        $jobApplication->applied_date = now();
        $jobApplication->save();

        // send job notification to Employeer
        $employer = User::where('id', $employer_id)->first();
        $mailData = [
            'employer' => $employer,
            'user' => auth()->user(),
            'job' => $job
        ];

        Mail::to($employer->email)->send(new JobNotificationEmail($mailData));
        Mail::to($employer->email)->send(new JobNotificationEmail($mailData));
        Mail::to($employer->email)->send(new JobNotificationEmail($mailData));

        session()->flash('success', 'Job applied successfully');

        return response()->json([
            'status' => true,
            'message' => 'Job applied successfully'
        ]);
    }

    public function myAppliedJobs()
    {
        $myAppliedJobs = JobApplication::where('user_id', auth()->user()->id)
            ->with('job')
            ->with('job.jobType')
            ->with('job.applications')
            ->paginate(5);
        // dd($myAppliedJobs);
        return view('auth.jobs.my-applied-jobs', compact('myAppliedJobs'));
    }

    public function removeJob(Request $request)
    {
        $jobApplication = JobApplication::where('id', $request->id)
            ->where('user_id', auth()->user()->id);

        if ($jobApplication == null) {
            session()->flash('error', 'Job not found');
            return response()->json([
                'status' => false,
                'error' => 'Job not found'
            ]);
        }

        JobApplication::find($request->id)->delete();

        session()->flash('success', 'Job removed successfully');
        return response()->json([
            'status' => true,
            'message' => 'Job removed successfully'
        ]);
    }
}
