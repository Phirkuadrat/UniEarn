<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Software Development',
            'slug' => 'software-development',
            'image' => 'categories/softwaredev.png',
        ]);

        Category::create([
            'name' => 'Design & Creative',
            'slug' => 'design-creative',
            'image' => 'categories/desain.png',
        ]);

        Category::create([
            'name' => 'Marketing & Communication',
            'slug' => 'marketing-communication',
            'image' => 'categories/marketing.png',
        ]);

        Category::create([
            'name' => 'Data & Analytics',
            'slug' => 'data-analytics',
            'image' => 'categories/dataanalis.png',
        ]);

        Category::create([
            'name' => 'Business & Management',
            'slug' => 'business-management',
            'image' => 'categories/bisnis.png',
        ]);

        Category::create([
            'name' => 'Education & Training',
            'slug' => 'education-training',
            'image' => 'categories/pendidikan.png',
        ]);

        Category::create([
            'name' => 'E-commerce',
            'slug' => 'ecommerce',
            'image' => 'categories/umkm.png',
        ]);

        Category::create([
            'name' => 'Engineering & Technology',
            'slug' => 'engineering-technology',
            'image' => 'categories/mesin.png',
        ]);

        Category::create([
            'name' => 'Environment & Agriculture',
            'slug' => 'environment-agriculture',
            'image' => 'categories/lingkungan.png',
        ]);

        Category::create([
            'name' => 'Health & Science',
            'slug' => 'health-science',
            'image' => 'categories/kesehatan.png',
        ]);
    }
}
