<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use App\Models\PortofolioImages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\ValidationException;

class PortofolioController extends Controller
{
    public function index()
    {
        return view('admin.portofolio.index');
    }

    public function getData()
    {
        $portofolios = Portofolio::with(['user', 'subCategory', 'category'])->select(['id', 'title', 'user_id', 'sub_category_id', 'category_id']);
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

    public function storePortfolio(Request $request)
    {
        $user = Auth::user();

        if (!$user->seeker) {
            return redirect()->back()->with('error', 'Only seekers can add portfolio projects.');
        }

        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'sub_category_id' => 'required|exists:sub_categories,id',
                'category_id' => 'required|exists:categories,id',
                'link' => 'nullable|url|max:255',
                'images' => 'array|max:5',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        $portfolio = new Portofolio();
        $portfolio->user_id = $user->id;
        $portfolio->title = $validatedData['title'];
        $portfolio->description = $validatedData['description'];
        $portfolio->sub_category_id = $validatedData['sub_category_id'];
        $portfolio->category_id = $validatedData['category_id'];
        $portfolio->link = $validatedData['link'] ?? null;
        $portfolio->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('portfolio_images', 'public');

                $portfolioImage = new PortofolioImages();
                $portfolioImage->portofolio_id = $portfolio->id;
                $portfolioImage->image_path = $imagePath;
                $portfolioImage->save();
            }
        }

        return redirect()->route('seeker.dashboard')->with('success', 'Portfolio project added successfully!');
    }

    public function deletePortofolio(Request $request, $id)
    {
        $portfolio = Portofolio::findOrFail($id);

        if ($portfolio->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'You do not have permission to delete this portfolio project.');
        }

        $portfolio->images()->each(function ($image) {
            $image->delete();
        });

        $portfolio->delete();

        return redirect()->route('seeker.dashboard')->with('success', 'Portfolio project deleted successfully!');
    }

    public function getEditData(Portofolio $portfolio)
    {
        return response()->json([
            'id' => $portfolio->id,
            'title' => $portfolio->title,
            'description' => $portfolio->description,
            'link' => $portfolio->link,
            'category' => $portfolio->category,
            'sub_category' => $portfolio->subCategory,
            'images' => $portfolio->images->map(function ($image) {
                return [
                    'id' => $image->id,
                    'image_path' => Storage::url($image->image_path),
                ];
            }),
        ]);
    }

    public function update(Request $request, Portofolio $portfolio)
    {
        $user = Auth::user();

        if (!$user->seeker || $user->id !== $portfolio->user_id) {
            return redirect()->back()->with('error', 'You are not authorized to edit this portfolio.');
        }

        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'sub_category_id' => 'nullable|exists:sub_categories,id',
                'link' => 'nullable|url|max:255',
                'images' => 'array|max:5',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'deleted_image_ids' => 'array',
                'deleted_image_ids.*' => 'exists:portofolio_images,id',
            ]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput()->with('portfolio_id_for_edit', $portfolio->id);
        }

        $currentImageCount = $portfolio->images()->count();
        $imagesToDeleteCount = count($validatedData['deleted_image_ids'] ?? []);
        $newImagesCount = count($request->file('images') ?? []);
        $remainingImagesCount = $currentImageCount - $imagesToDeleteCount;
        $totalFinalImages = $remainingImagesCount + $newImagesCount;

        if ($totalFinalImages > 5) {
            return redirect()->back()->withInput()->withErrors(['images' => 'You can only have a maximum of 5 images per portfolio.'])
                ->with('portfolio_id_for_edit', $portfolio->id);
        }

        $portfolio->title = $validatedData['title'];
        $portfolio->description = $validatedData['description'];
        $portfolio->category_id = $validatedData['category_id'];
        $portfolio->sub_category_id = $validatedData['sub_category_id'];
        $portfolio->link = $validatedData['link'] ?? null;
        $portfolio->save();

        if (isset($validatedData['deleted_image_ids'])) {
            foreach ($validatedData['deleted_image_ids'] as $imageId) {
                $imageToDelete = PortofolioImages::find($imageId);
                if ($imageToDelete && $imageToDelete->portofolio_id === $portfolio->id) {
                    Storage::disk('public')->delete($imageToDelete->image_path);
                    $imageToDelete->delete();
                }
            }
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('portfolio_images', 'public');

                $portfolioImage = new PortofolioImages();
                $portfolioImage->portofolio_id = $portfolio->id;
                $portfolioImage->image_path = $imagePath;
                $portfolioImage->save();
            }
        }

        return redirect()->route('seeker.dashboard')->with('success', 'Portfolio project updated successfully!');
    }

    public function getDetails(Portofolio $portfolio)
    {
        $portfolio->load(['images', 'category', 'subCategory']);
        
        return response()->json([
            'id' => $portfolio->id,
            'title' => $portfolio->title,
            'description' => $portfolio->description,
            'link' => $portfolio->link,
            'category' => $portfolio->category ? $portfolio->category->name : null,
            'sub_category' => $portfolio->subCategory ? $portfolio->subCategory->name : null,
            'images' => $portfolio->images->map(function ($image) {
                return [
                    'id' => $image->id,
                    'image_path' => Storage::url($image->image_path),
                ];
            })->toArray(), 
        ]);
    }
}
