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
            'id' => 1,
            'name' => 'Software Development',
            'slug' => 'software-development',
            'image' => 'categories/softwaredev.png',
        ]);

        Category::create([
            'id' => 2,
            'name' => 'Design & Creative',
            'slug' => 'design-creative',
            'image' => 'categories/desain.png',
        ]);

        Category::create([
            'id' => 3,
            'name' => 'Marketing & Communication',
            'slug' => 'marketing-communication',
            'image' => 'categories/marketing.png',
        ]);

        Category::create([
            'id' => 4,
            'name' => 'Data & Analytics',
            'slug' => 'data-analytics',
            'image' => 'categories/dataanalis.png',
        ]);

        Category::create([
            'id' => 5,
            'name' => 'Business & Management',
            'slug' => 'business-management',
            'image' => 'categories/bisnis.png',
        ]);

        Category::create([
            'id' => 6,
            'name' => 'Education & Training',
            'slug' => 'education-training',
            'image' => 'categories/pendidikan.png',
        ]);

        Category::create([
            'id' => 7,
            'name' => 'E-commerce',
            'slug' => 'ecommerce',
            'image' => 'categories/umkm.png',
        ]);

        Category::create([
            'id' => 8,
            'name' => 'Engineering & Technology',
            'slug' => 'engineering-technology',
            'image' => 'categories/mesin.png',
        ]);

        Category::create([
            'id' => 9,
            'name' => 'Environment & Agriculture',
            'slug' => 'environment-agriculture',
            'image' => 'categories/lingkungan.png',
        ]);

        Category::create([
            'id' => 10,
            'name' => 'Health & Science',
            'slug' => 'health-science',
            'image' => 'categories/kesehatan.png',
        ]);
    }
}
