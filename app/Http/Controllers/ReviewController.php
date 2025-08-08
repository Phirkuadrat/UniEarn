<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ReviewController extends Controller
{
    public function index($projectId)
    {
        $reviews = Review::with('user')
            ->where('id_project', $projectId)
            ->get();

        return response()->json($reviews);
    }

    public function store($jobId, Request $request)
    {
        $user = Auth::user();

        if (!$user->recruiter) {
            return response()->json(['error' => 'Only recruiters can create reviews.'], 403);
        }

        try {
            $validatedData = $request->validate([
                'rating' => 'required|integer|min:1|max:5',
                'review' => 'nullable|string',
            ]);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }

        $project = Project::findOrFail($jobId);
        $project->status = 'completed';
        $project->save();

        $application = $project->applications()
            ->where('project_id', $jobId)
            ->where('status', 'approved')
            ->first();

        $review = Review::create([
            'id_user' => $application->user_id,
            'id_project' => $jobId,
            'rating' => $validatedData['rating'],
            'review' => $validatedData['review'],
        ]);

        return redirect()->back()->with('success',  'Review created successfully!');
    }
}
