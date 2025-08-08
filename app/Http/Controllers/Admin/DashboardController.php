<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// Pastikan semua Model yang dibutuhkan di-import
use App\Models\Project;
use App\Models\Recruiter;
use App\Models\Seeker;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Data untuk Card Statistik
        // PASTIKAN BARIS INI ADA
        $totalProjects = Project::count();
        $totalRecruiters = Recruiter::count();
        $totalSeekers = Seeker::count();

        // 2. Data untuk Chart "New User Per Month"
        $usersPerMonth = User::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as count')
        )
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        $userLabels = [];
        $userData = [];
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $monthData = array_fill(1, 12, 0);

        foreach ($usersPerMonth as $user) {
            $monthData[$user->month] = $user->count;
        }

        foreach ($monthData as $monthNum => $count) {
            $userLabels[] = $months[$monthNum - 1];
            $userData[] = $count;
        }

        // 3. Data untuk Chart & Tabel "Project by Categories"
        $projectsByCategory = Category::withCount('projects')->get();
        // PASTIKAN SEMUA VARIABEL DIKIRIM KE VIEW
        return view('admin.dashboard', [
            'totalProjects' => $totalProjects, // <-- Variabel ini harus ada di sini
            'totalRecruiters' => $totalRecruiters,
            'totalSeekers' => $totalSeekers,
            'userLabels' => $userLabels,
            'userData' => $userData,
            'projectsByCategory' => $projectsByCategory,
        ]);
    }
}
