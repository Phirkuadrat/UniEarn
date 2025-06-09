<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeekerController extends Controller
{

    public function index()
    {
        $portfolios = Portofolio::where('user_id', Auth::id())
            ->with('category')
            ->with('subCategory')
            ->latest()
            ->limit(3)
            ->get();
        return view('user.seeker.dashboardSeeker', compact('portfolios'));
    }

    public function portfoliosIndex(Request $request)
    {
        $user = Auth::user();

        if (!$user->seeker) {
            return redirect()->route('seeker.dashboard')->with('error', 'You must be a seeker to view portfolios.');
        }

        $portfolios = Portofolio::where('user_id', $user->id)
            ->with(['images', 'category', 'subCategory'])
            ->latest(); 
        
            if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $portfolios->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        if ($request->has('category') && !empty($request->category)) {
            $portfolios->where('category_id', $request->category);
        }

        $portfolios = $portfolios->paginate(12); 

        $categories = Category::all();

        return view('user.seeker.portfolios', [ 
            'portfolios' => $portfolios,
            'categories' => $categories, 
            'oldSearch' => $request->search,
            'oldCategory' => $request->category,
        ]);
    }



    public function applications()
    {
        $applications = collect([
            (object)[
                'id' => 1,
                'project_id' => 101,
                'project_title' => 'Pengembangan Fitur Live Chat untuk Platform Edukasi',
                'status' => 'accepted',
                'project_category' => 'Web Development',
                'message' => 'Sangat antusias untuk berkontribusi dalam proyek ini.'
            ],
            (object)[
                'id' => 2,
                'project_id' => 102,
                'project_title' => 'Pembuatan Konten Media Sosial untuk Brand Fashion Lokal',
                'status' => 'pending',
                'project_category' => 'Digital Marketing',
                'message' => 'Melampirkan portofolio terkait pembuatan konten.'
            ],
            (object)[
                'id' => 3,
                'project_id' => 103,
                'project_title' => 'Riset Pasar untuk Produk Aplikasi Kesehatan Mental',
                'status' => 'rejected',
                'project_category' => 'Market Research',
                'message' => 'Terima kasih atas kesempatannya.'
            ],
            (object)[
                'id' => 4,
                'project_id' => 104,
                'project_title' => 'UI Redesign Aplikasi Mobile Travel',
                'status' => 'accepted',
                'project_category' => 'UI/UX Design',
                'message' => 'Siap untuk memulai diskusi lebih lanjut.'
            ]
        ]);

        return view('user.seeker.applications', compact('applications'));
    }
}
