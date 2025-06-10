<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Seeker;
use App\Models\Recruiter;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    function landing()
    {
        $categories = Category::with('subCategories')->get();
        return view('landingPage', compact('categories'));
    }

    public function viewProjectPage()
    {
        return view('user.projectPage');
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
