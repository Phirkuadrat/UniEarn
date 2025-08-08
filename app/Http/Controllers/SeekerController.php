<?php

namespace App\Http\Controllers;

use App\Models\Seeker;
use App\Models\Category;
use App\Models\Portofolio;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        $applications = Application::where('user_id', Auth::id())
            ->with('project')
            ->latest()
            ->limit(3)
            ->get();
        return view('user.seeker.dashboardSeeker', compact('portfolios', 'applications'));
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

    public function applicationIndex()
    {
        $applications = Application::where('user_id', Auth::id())
            ->with('user')
            ->with('project')
            ->latest()
            ->paginate(15);;
        return view('user.seeker.applications', compact('applications'));
    }

    public function getSeekerProfile(User $user)
    {
        Log::info("getSeekerProfile: Method started for User ID: {$user->id}, Role: {$user->role}"); // Log 1

        if (!$user->isSeeker()) {
            Log::warning("getSeekerProfile: User ID: {$user->id} does not have seeker role."); // Log 1.1
            return response()->json(['message' => 'User does not have seeker role.'], 403);
        }

        // Eager load seeker relationship and portfolios relations
        $user->load([
            'seeker',
            'portfolios.images',
            'portfolios.category',
            'portfolios.subCategory'
        ]);

        if (!$user->seeker) {
            Log::warning("getSeekerProfile: Seeker profile not found for User ID: {$user->id}"); // Log 2
            return response()->json(['message' => 'Seeker profile not found for this user.'], 404);
        }

        $seeker = $user->seeker;
        Log::info("getSeekerProfile: Seeker profile found for User ID: {$user->id}, Seeker ID: {$seeker->id}"); // Log 3

        $portfoliosData = $user->portfolios->map(function ($portfolio) {
            try {
                $categoryName = $portfolio->category->name ?? 'N/A';
                $subCategoryName = $portfolio->subCategory->name ?? null;
                $imagePaths = $portfolio->images->map(function ($image) {
                    return [
                        'id' => $image->id,
                        'image_path' => Storage::url($image->image_path),
                    ];
                })->toArray();

                return [
                    'id' => $portfolio->id,
                    'title' => $portfolio->title,
                    'description' => $portfolio->description,
                    'link' => $portfolio->link ?? null,
                    'category_name' => $categoryName,
                    'sub_category_name' => $subCategoryName,
                    'images' => $imagePaths,
                ];
            } catch (\Exception $e) {
                Log::error("getSeekerProfile: Error mapping portfolio ID {$portfolio->id}. Error: " . $e->getMessage());
                return [];
            }
        })->toArray();
        Log::info("getSeekerProfile: Portfolios data mapped for User ID: {$user->id}. Count: " . count($portfoliosData));

        $phone = $seeker->phone ?? 'N/A';
        $address = $seeker->address ?? 'N/A';
        $profilePicture = $seeker->profile_picture ? Storage::url($seeker->profile_picture) : null;
        $bio = $seeker->bio ?? 'No bio provided.';

        Log::info("getSeekerProfile: Preparing final response for User ID: {$user->id}");

        return response()->json([
            'id' => $seeker->id,
            'user_id' => $user->id,
            'name' => $user->name ?? 'N/A',
            'email' => $user->email ?? 'N/A',
            'phone' => $phone,
            'address' => $address,
            'profile_picture' => $profilePicture,
            'bio' => $bio,
            'portfolios' => $portfoliosData,
        ]);
    }
}
