<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\ValidationException;

class ProjectController extends Controller
{
    public function index()
    {
        return view('admin.project.index');
    }

    public function getData()
    {
        $portofolios = Project::with(['user', 'subCategory', 'category'])->select(['id', 'title', 'user_id', 'sub_category_id', 'category_id']);
        return DataTables::of($portofolios)
            ->addColumn('user', function ($row) {
                return $row->user ? $row->user->name : 'N/A';
            })
            ->addColumn('sub_category_id', function ($row) {
                return $row->subCategory ? $row->subCategory->name : 'N/A';
            })
            ->addColumn('category', function ($row) {
                return $row->category ? $row->category->name : 'N/A';
            })
            ->addColumn('action', function ($row) {
                return '
                <div class="flex items-center gap-2">
                    <button 
                        onclick="" 
                        class="text-blue-600 hover:text-blue-800"
                        title="View Details">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </button>
                </div>
                ';
            })
            ->rawColumns(['user', 'sub_category_id', 'category', 'action'])
            ->make(true);
    }

    public function storeProject(Request $request)
    {
        $user = Auth::user();

        if (!$user->recruiter) {
            return redirect()->back()->with('error', 'Only recruiters can post projects/jobs.');
        }

        try {
            $validatedData = $request->validate([
                'user_id' => 'required|exists:users,id',
                'category_id' => 'required|exists:categories,id',
                'sub_category_id' => 'nullable|exists:sub_categories,id',
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'budget' => 'required|numeric|min:0',
                'due_date' => 'required|date|after_or_equal:today',
                'status' => 'required|in:Open,Closed,In Progress',
            ]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput()->with('from_add_project_modal', true);
        }

        $project = new Project();
        $project->user_id = $validatedData['user_id'];
        $project->category_id = $validatedData['category_id'];
        $project->sub_category_id = $validatedData['sub_category_id'];
        $project->title = $validatedData['title'];
        $project->description = $validatedData['description'];
        $project->budget = $validatedData['budget'];
        $project->due_date = $validatedData['due_date'];
        $project->status = $validatedData['status'];
        $project->save();

        return redirect()->route('recruiter.dashboard')->with('success', 'Project posted successfully!');
    }

    public function deleteProject(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        if ($project->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'You do not have permission to delete this project.');
        }

        $project->delete();

        return redirect()->route('recruiter.dashboard')->with('success', 'Project deleted successfully!');
    }

    public function getEditData(Project $job)
    {
        $user = Auth::user();

        if (!$user->recruiter || $user->id !== $job->user_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $job->load(['category', 'subCategory']);

        return response()->json([
            'id' => $job->id,
            'title' => $job->title,
            'description' => $job->description,
            'budget' => $job->budget,
            'due_date' => $job->due_date,
            'status' => $job->status,
            'category_id' => $job->category_id,
            'category_name' => $job->category->name ?? null,
            'sub_category_id' => $job->sub_category_id,
            'sub_category_name' => $job->subCategory->name ?? null,
        ]);
    }

    public function update(Request $request, Project $job)
    {
        $user = Auth::user();

        if (!$user->recruiter || $user->id !== $job->user_id) {
            return redirect()->back()->with('error', 'You are not authorized to edit this project/job.');
        }

        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'sub_category_id' => 'required|exists:sub_categories,id',
                'budget' => 'required|numeric|min:0',
                'due_date' => 'required|date|after_or_equal:today',
                'status' => 'required|in:open,draft',
            ]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput()
                ->with('from_edit_project_modal', true)
                ->with('project_id_for_edit', $job->id);
        }

        $job->title = $validatedData['title'];
        $job->description = $validatedData['description'];
        $job->category_id = $validatedData['category_id'];
        $job->sub_category_id = $validatedData['sub_category_id'] ?? null;
        $job->budget = $validatedData['budget'];
        $job->due_date = $validatedData['due_date'];
        $job->status = $validatedData['status'];
        $job->save();

        return redirect()->route('recruiter.dashboard')->with('success', 'Project updated successfully!');
    }

    public function getDetails(Project $job)
    {
        $job->load(['category', 'subCategory', 'user']);
        return response()->json([
            'id' => $job->id,
            'title' => $job->title,
            'description' => $job->description,
            'budget' => $job->budget,
            'due_date' => $job->due_date,
            'status' => $job->status,
            'category_name' => $job->category->name ?? null,
            'sub_category_name' => $job->subCategory->name ?? null,
            'recruiter' => [
                'id' => $job->user->id,
                'company_name' => $job->user->recruiter->company_name ?? $job->user->name ?? null,
                'company_logo' => $job->user->recruiter->company_logo ? Storage::url($job->user->recruiter->company_logo) : null,
                'user' => [
                    'name' => $job->recruiter->user->name ?? null,
                ],
            ],
        ]);
    }

    public function done($id)
    {
        $project = Project::findOrFail($id);

        $project->status = 'completed_pending_review';
        $project->save();
        return redirect()->route('recruiter.dashboard')->with('success', 'Project status updated successfully!');
    }
}
