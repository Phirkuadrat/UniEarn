<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class seeker extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'profile_picture',
        'bio',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function seekerSubCategories()
    {
        return $this->belongsToMany(SeekerSubCategory::class, 'seeker_sub_categories');
    }
}
