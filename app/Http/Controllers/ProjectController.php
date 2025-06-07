<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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
}
