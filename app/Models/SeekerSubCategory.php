<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeekerSubCategory extends Model
{
    protected $fillable = [
        'name',
        'sub_category_id',
        'seeker_id',
        'slug',
    ];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function seeker()
    {
        return $this->belongsTo(Seeker::class);
    }
}
