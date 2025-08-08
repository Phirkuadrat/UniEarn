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

        $totalJobListings = Project::where('user_id', $user->id)
            ->where('status', '=', 'open')                 
            ->count();
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

    public function projectIndex(Request $request)
    {
        $user = Auth::user();

        $projectsQuery = Project::where('user_id', $user->id);

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $projectsQuery->where('title', 'like', '%' . $search . '%');
        }

        if ($request->has('status') && !empty($request->status)) {
            $projectsQuery->where('status', $request->status);
        }

        $projects = $projectsQuery->paginate(10);

        return view('user.recruiter.project', [
            'projects' => $projects,
            'oldSearch' => $request->search,
            'oldStatus' => $request->status,
        ]);
    }

    public function recruiterApplicationIndex(Request $request)
    {
        $user = Auth::user();

        if (!$user->recruiter) {
            return redirect()->route('recruiter.dashboard')->with('error', 'You must be a recruiter to view applications.');
        }

        $applicationsQuery = Application::whereHas('project', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->with(['user', 'project'])
            ->latest();

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $applicationsQuery->where(function ($query) use ($search) {
                $query->whereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                })->orWhereHas('project', function ($q) use ($search) {
                    $q->where('title', 'like', '%' . $search . '%');
                });
            });
        }

        if ($request->has('status') && !empty($request->status)) {
            $applicationsQuery->where('status', $request->status);
        }

        $applications = $applicationsQuery->paginate(10);

        return view('user.recruiter.applications', [
            'applications' => $applications,
            'oldSearch' => $request->search,
            'oldStatus' => $request->status,
        ]);
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
