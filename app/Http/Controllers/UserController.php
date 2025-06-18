<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Seeker;
use App\Models\Project;
use App\Models\Category;
use App\Models\Recruiter;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    function landing()
    {
        $categories = Category::with('subCategories')->get();
        $projects = Project::with('category', 'subCategory', 'user')
            ->where('status', 'open')
            ->latest()
            ->take(3)
            ->get();
        return view('landingPage', compact('categories', 'projects'));
    }

    public function viewProjectPage(Request $request)
    {
        $projects = Project::with('category', 'subCategory', 'user')->where('status', 'open')->latest();

        $headerTitle = 'All Available Projects';
        $headerDescription = 'Explore various project and internships categories—from tech, design, and writing to research—all designed
                    specifically for students like you.';

        $search = $request->input('search');
        $categoryId = $request->input('category');

        if (!empty($search)) {
            $projects->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
            $headerTitle = 'Search Results for "' . $search . '"';
            $headerDescription = 'Projects matching your search query.';
        }

        if (!empty($categoryId)) {
            $projects->where('category_id', $categoryId);
            $category = Category::find($categoryId);
            if ($category) {
                $headerTitle = $category->name . ' Projects';
                $headerDescription = 'Projects in ' . $category->name . ' category.';
            }
        }

        $projects = $projects->paginate(12)->withQueryString();

        $categories = Category::select('id', 'name')->get();

        return view('user.projectPage', [
            'projects' => $projects,
            'categories' => $categories,
            'oldSearch' => $search,
            'oldCategory' => $categoryId,
            'headerTitle' => $headerTitle,
            'headerDescription' => $headerDescription,
        ]);
    }

    public function viewPortofolioPage()
    {
        return view('user.portofolioPage');
    }

    function index(Request $request)
    {
        $users = User::latest()->get();
        $seekerCount = Seeker::count();
        $recruiterCount = Recruiter::count();
        return view('admin.user-management.index', compact('users', 'seekerCount', 'recruiterCount'));
    }

    public function getData()
    {
        $users = User::select(['id', 'name', 'email', 'created_at']);

        return DataTables::of($users)
            ->editColumn('created_at', function ($user) {
                return $user->created_at->format('d M Y');
            })
            ->make(true);
    }
}
