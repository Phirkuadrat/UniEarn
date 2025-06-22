<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecruiterController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user->recruiter) {
            return redirect()->route('recruiter.dashboard')->with('error', 'You must be a recruiter.');
        }

        $recruiter = $user->recruiter;

        $totalJobListings = Project::where('user_id', $user->id)->count();
        $totalApplications = Application::whereHas('project', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->count();
        $pendingReviews = Application::whereHas('project', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->where('status', 'Pending')->count();

        $recentApplications = Application::whereHas('project', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->with(['user', 'project'])
            ->latest()
            ->limit(5)
            ->get();

        $activeJobListings = Project::where('user_id', $user->id)
            ->withCount('applications')
            ->with('category')
            ->latest()
            ->limit(3)
            ->get();

        return view('user.recruiter.dashboardRecruiter', [
            'user' => $user,
            'recruiter' => $recruiter,
            'totalJobListings' => $totalJobListings,
            'totalApplications' => $totalApplications,
            'pendingReviews' => $pendingReviews,
            'recentApplications' => $recentApplications,
            'activeJobListings' => $activeJobListings,
        ]);
    }

    public function projectIndex()
    {
        $user = Auth::user();
        $projects = Project::where('user_id', $user->id)->get();
        return view('user.recruiter.project', compact('projects'));
    }

    public function recruiterApplicationIndex()
    {
        $user = Auth::user();

        $applications = Application::whereHas('project', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->with(['user', 'project'])
            ->latest()
            ->paginate(15);;
        return view('user.recruiter.applications', compact('applications'));
    }

    public function emailPreview($userId)
    {
        // Fetch the full email content for the user (simulate or fetch from database)
        // For demonstration, we will render the approved application email with dummy data
        $applicantName = 'Lutfi Firmansyah';
        $jobTitle = 'Backend Development (API Integration)';
        $projectLink = url('/project/123/details');

        $emailContent = view('emails.application.approved', compact('applicantName', 'jobTitle', 'projectLink'))->render();

        return view('partials.email-preview', compact('emailContent'));
    }
}
