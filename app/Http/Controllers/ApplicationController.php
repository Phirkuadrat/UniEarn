<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Mail\ApplicationApproved;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{
    public function apply(Request $request, Project $project)
    {
        $user = Auth::user();

        if ($project->status !== 'open') {
            return redirect()->back()->with('error', 'This project is not open for applications.');
        }

        if (Application::where('user_id', $user->id)->where('project_id', $project->id)->exists()) {
            return redirect()->back()->with('info', 'You have already applied for this project.');
        }

        Application::create([
            'user_id' => $user->id,
            'project_id' => $project->id,
            'status' => 'pending',
        ]);
        return redirect()->route('seeker.dashboard')->with('success', 'Application submitted successfully!');
    }

    public function approve(Request $request, Application $application)
    {
        $user = Auth::user();

        $application->load('project.user');
        if ($user->id !== $application->project->user_id) {
            return redirect()->back()->with('error', 'You are not authorized to approve this application.');
        }

        if ($application->status !== 'pending') {
            return redirect()->back()->with('error', 'Only Pending applications can be approved.');
        }

        $application->status = 'approved';
        $application->save();

        $projectId = $application->project_id;
        $project = Project::where('id', $projectId)->first();
        if ($project) {
            $project->status = 'in_progress';
            $project->save();
        }

        $rejectedCount = 0;

        $remainingApplications = Application::where('project_id', $projectId)
            ->where('id', '!=', $application->id)
            ->whereIn('status', ['pending'])
            ->get();

        foreach ($remainingApplications as $remainingApp) {
            $remainingApp->status = 'rejected';
            $remainingApp->save();
            $rejectedCount++;
        }

        if ($application->user && $application->user->email) {
            Mail::to($application->user->email)->send(
                new ApplicationApproved(
                    $application,
                    $application->project->title
                )
            );
        }

        $message = "Application for has been approved.";
        if ($rejectedCount > 0) {
            $message .= " All {$rejectedCount} other applications for this project have been automatically rejected.";
        }

        return redirect()->back()->with('success', $message);
    }

    public function reject(Request $request, Application $application)
    {
        $user = Auth::user();

        $application->load('project.user');
        if ($user->id !== $application->project->user_id) {
            return redirect()->back()->with('error', 'You are not authorized to approve this application.');
        }

        if ($application->status !== 'pending') {
            return redirect()->back()->with('error', 'Only Pending applications can be approved.');
        }

        $application->status = 'rejected';
        $application->save();

        return redirect()->back()->with('success', "Application has been rejected.");
    }

    public function applicationIndex()
    {
        return view('admin.application.index');
    }

    public function getData(Request $request)
    {
        $applications = Application::with(['user', 'project'])
            ->orderBy('created_at', 'desc')
            ->get();

        return datatables()->of($applications)
            ->addColumn('applicant_name', function ($application) {
                return $application->user ? $application->user->name : 'N/A';
            })
            ->addColumn('project_title', function ($application) {
                return $application->project ? $application->project->title : 'N/A';
            })
            ->addColumn('status', function ($application) {
                return $application->status;
            })
            ->addColumn('applied_on', function ($application) {
                return $application->created_at ? $application->created_at->format('Y-m-d H:i:s') : 'N/A';
            })
            ->rawColumns(['user', 'sub_category_id', 'category', 'action'])
            ->make(true);
    }
}
