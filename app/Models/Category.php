<?php

namespace App\Models;

use App\Models\Project; // Import model Project
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Disarankan untuk ditambahkan
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory; // Disarankan untuk ditambahkan

    protected $fillable = [
        'name',
        'slug',
        'image',
    ];

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    // Tambahkan method relasi ini
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
