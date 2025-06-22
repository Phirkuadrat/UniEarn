<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
// Pastikan semua Model yang dibutuhkan di-import
use App\Models\Seeker;
use App\Models\Project;
use App\Models\Category;
use App\Models\Recruiter;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalApplications = Application::count();
        $totalProjects = Project::count();
        $totalRecruiters = Recruiter::count();
        $totalSeekers = Seeker::count();

        $year = Carbon::now()->year;
        $usersPerMonth = User::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as count')
        )
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        $monthNames = [
            1 => 'Jan',
            2 => 'Feb',
            3 => 'Mar',
            4 => 'Apr',
            5 => 'May',
            6 => 'Jun',
            7 => 'Jul',
            8 => 'Aug',
            9 => 'Sep',
            10 => 'Oct',
            11 => 'Nov',
            12 => 'Dec'
        ];

        $allMonthsData = array_fill(1, 12, 0);

        foreach ($usersPerMonth as $userMonth) {
            $allMonthsData[$userMonth->month] = $userMonth->count;
        }

        $labels = [];
        $data = [];
        foreach ($monthNames as $monthNum => $monthName) {
            $labels[] = $monthName;
            $data[] = $allMonthsData[$monthNum];
        }

        $projectsByCategory = Project::select('category_id', DB::raw('COUNT(*) as total_projects'))->where('status', 'Open')
            ->groupBy('category_id')
            ->orderByDesc('total_projects')
            ->limit(5)
            ->with('category')
            ->get();

        $categoryLabels = [];
        $categoryData = [];

        $predefinedColors = [
            '#1892C8', 
            '#22C55E', 
            '#9B59B6', 
            '#F39C12', 
            '#34495E', 
            '#A0D9EF',
            '#D4EDDA', 
            '#E0BBE4',
        ];
        $colorIndex = 0;

        foreach ($projectsByCategory as $projectCategory) {
            $categoryLabels[] = $projectCategory->category->name ?? 'Uncategorized'; 
            $categoryData[] = $projectCategory->total_projects; 
            $categoryColors[] = $predefinedColors[$colorIndex % count($predefinedColors)];
            $colorIndex++;
        }

        $projectParticipants = Project::with('category')
            ->withCount('applications')
            ->orderBy('id')
            ->limit(5)
            ->get();

        return view('admin.dashboard', [
            'totalApplications' => $totalApplications,
            'totalProjects' => $totalProjects,
            'totalRecruiters' => $totalRecruiters,
            'totalSeekers' => $totalSeekers,
            'userLabels' => $labels,
            'userData' => $data,
            'projectsByCategory' => $projectsByCategory,
            'chartLabels' => json_encode($labels),
            'chartData' => json_encode($data),
            'categoryChartLabels' => json_encode($categoryLabels),
            'categoryChartData' => json_encode($categoryData),
            'categoryChartColors' => json_encode($categoryColors),
            'projectParticipants' => $projectParticipants,
        ]);
    }
}
