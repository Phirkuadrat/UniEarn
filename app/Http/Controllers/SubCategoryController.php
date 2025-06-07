<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.subcategory-management.index', compact('categories'));
    }

    public function getData()
    {
        $categories = SubCategory::with('category')->select(['id', 'category_id', 'name', 'image']);

        return DataTables::of($categories)
            ->addColumn('image', function ($row) {
                if ($row->image) {
                    return asset('storage/' . $row->image);
                }
                return asset('images/placeholder.png');
            })
            ->addColumn('category_id', function ($row) {
                return $row->category ? $row->category->name : 'N/A';
            })
            ->addColumn('subcategory', function ($row) {
                return $row->name;
            })
            ->addColumn('actions', function ($row) {
                return '
                <div class="flex items-center gap-2">
                    <button 
                        onclick="openEditModal(' . $row->id . ', \'' . e($row->name) . '\', \'' . asset('storage/' . $row->image) . '\', ' . $row->category_id . ')" 
                        class="text-blue-600 hover:text-blue-800"
                        title="Edit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </button>
                    <form action="' . route('subcategory.delete', $row->id) . '" method="POST" onsubmit="return confirm(\'Are you sure?\')" class="inline">
                        ' . csrf_field() . method_field('DELETE') . '
                        <button type="submit" class="inline-flex items-center justify-center p-2 rounded-full text-red-600 hover:bg-red-100 hover:text-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition duration-200" title="Delete">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </form>
                </div>
                ';
            })
            ->rawColumns(['category_id', 'image', 'actions', 'subcategory'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5024',
        ]);

        $subcategory = new SubCategory();
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category_id;
        $subcategory->slug = Str::slug($request->name);
        if ($request->hasFile('image')) {
            $subcategory->image = $request->file('image')->store('subcategories', 'public');
        }
        $subcategory->save();
        return redirect()->route('subcategory.manage')->with('success', 'Category created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5024',
        ]);
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category_id;
        $subcategory->slug = Str::slug($request->name);
        if ($request->hasFile('image')) {
            if ($subcategory->image) {
                Storage::disk('public')->delete($subcategory->image);
            }
            $subcategory->image = $request->file('image')->store('subcategories', 'public');
        }
        $subcategory->save();
        return redirect()->route('subcategory.manage')->with('success', 'Subcategory updated successfully.');
    }

    public function destroy($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        if ($subcategory->image) {
            Storage::disk('public')->delete($subcategory->image);
        }
        $subcategory->delete();
        return redirect()->route('subcategory.manage')->with('success', 'Subcategory deleted successfully.');
    }
}
