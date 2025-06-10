<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'image',
        'slug',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function seekerSubCategories()
    {
        return $this->belongsToMany(SeekerSubCategory::class, 'seeker_sub_categories');
    }
}
