<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecruiterController extends Controller
{
    public function homePage()
    {
        return view('user.recruiterPage');
    }


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
        })->with(['seeker.user', 'job'])
            ->latest()
            ->limit(5)
            ->get();

        $activeJobListings = Project::where('user_id', $user->id)
            ->withCount('applications')
            ->with('category')
            ->latest()
            ->limit(6)
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
}
