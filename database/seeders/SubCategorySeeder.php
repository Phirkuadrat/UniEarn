<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubCategory::create([
            'category_id' => 1,
            'name' => 'Front-end Developer',
            'image' => 'categories/1.png',
            'slug' => 'front-end-developer',
        ]);
        SubCategory::create([
            'category_id' => 1,
            'name' => 'Back-end Developer',
            'image' => 'categories/1.png',
            'slug' => 'back-end-developer',
        ]);
        SubCategory::create([
            'category_id' => 1,
            'name' => 'Full-stack Developer',
            'image' => 'categories/1.png',
            'slug' => 'full-stack-developer',
        ]);
        SubCategory::create([
            'category_id' => 1,
            'name' => 'Mobile Developer',
            'image' => 'categories/1.png',
            'slug' => 'mobile-developer',
        ]);
        SubCategory::create([
            'category_id' => 1,
            'name' => 'Game Developer',
            'image' => 'categories/1.png',
            'slug' => 'game-developer',
        ]);
        SubCategory::create([
            'category_id' => 1,
            'name' => 'Software Tester',
            'image' => 'categories/1.png',
            'slug' => 'software-tester',
        ]);

        SubCategory::create([
            'category_id' => 2,
            'name' => 'UI/UX Designer',
            'image' => 'categories/1.png',
            'slug' => 'ui-ux-designer',
        ]);
        SubCategory::create([
            'category_id' => 2,
            'name' => 'Graphic Designer',
            'image' => 'categories/1.png',
            'slug' => 'graphic-designer',
        ]);
        SubCategory::create([
            'category_id' => 2,
            'name' => 'Illustrator',
            'image' => 'categories/1.png',
            'slug' => 'illustrator',
        ]);
        SubCategory::create([
            'category_id' => 2,
            'name' => 'Animator',
            'image' => 'categories/1.png',
            'slug' => 'animator',
        ]);
        SubCategory::create([
            'category_id' => 2,
            'name' => 'Video Editor',
            'image' => 'categories/1.png',
            'slug' => 'video-editor',
        ]);
        SubCategory::create([
            'category_id' => 2,
            'name' => 'Product Designer',
            'image' => 'categories/1.png',
            'slug' => 'product-designer',
        ]);

        SubCategory::create([
            'category_id' => 3,
            'name' => 'Digital Marketing',
            'image' => 'categories/1.png',
            'slug' => 'digital-marketing',
        ]);
        SubCategory::create([
            'category_id' => 3,
            'name' => 'Social Media Specialist',
            'image' => 'categories/1.png',
            'slug' => 'social-media-specialist',
        ]);
        SubCategory::create([
            'category_id' => 3,
            'name' => 'SEO Specialist',
            'image' => 'categories/1.png',
            'slug' => 'seo-specialist',
        ]);
        SubCategory::create([
            'category_id' => 3,
            'name' => 'Copywriter',
            'image' => 'categories/1.png',
            'slug' => 'copywriter',
        ]);
        SubCategory::create([
            'category_id' => 3,
            'name' => 'Content Creator',
            'image' => 'categories/1.png',
            'slug' => 'content-creator',
        ]);
        SubCategory::create([
            'category_id' => 3,
            'name' => 'Public Relations',
            'image' => 'categories/1.png',
            'slug' => 'public-relations',
        ]);

        SubCategory::create([
            'category_id' => 4,
            'name' => 'Data Analyst',
            'image' => 'categories/1.png',
            'slug' => 'data-analyst',
        ]);
        SubCategory::create([
            'category_id' => 4,
            'name' => 'Data Scientist',
            'image' => 'categories/1.png',
            'slug' => 'data-scientist',
        ]);
        SubCategory::create([
            'category_id' => 4,
            'name' => 'Business Intelligence',
            'image' => 'categories/1.png',
            'slug' => 'business-intelligence',
        ]);
        SubCategory::create([
            'category_id' => 4,
            'name' => 'Data Engineer',
            'image' => 'categories/1.png',
            'slug' => 'data-engineer',
        ]);

        // Business Development
        SubCategory::create([
            'category_id' => 5,
            'name' => 'Business Development',
            'image' => 'categories/business-development.png',
            'slug' => 'business-development',
        ]);

        // Project Management
        SubCategory::create([
            'category_id' => 5,
            'name' => 'Project Management',
            'image' => 'categories/project-management.png',
            'slug' => 'project-management',
        ]);

        // Human Resources (HR)
        SubCategory::create([
            'category_id' => 5,
            'name' => 'Human Resources (HR)',
            'image' => 'categories/human-resources.png',
            'slug' => 'human-resources-hr',
        ]);

        // Finance & Accounting
        SubCategory::create([
            'category_id' => 5,
            'name' => 'Finance & Accounting',
            'image' => 'categories/finance-accounting.png',
            'slug' => 'finance-accounting',
        ]);

        // Customer Relationship
        SubCategory::create([
            'category_id' => 5,
            'name' => 'Customer Relationship',
            'image' => 'categories/customer-relationship.png',
            'slug' => 'customer-relationship',
        ]);

        // Tutor / Pengajar Online
        SubCategory::create([
            'category_id' => 6,
            'name' => 'Tutor / Pengajar Online',
            'image' => 'categories/tutor-online.png', // Anda bisa mengganti nama file gambar
            'slug' => 'tutor-pengajar-online',
        ]);

        // Content Creator Edukasi
        SubCategory::create([
            'category_id' => 6,
            'name' => 'Content Creator Edukasi',
            'image' => 'categories/content-creator-edukasi.png', // Anda bisa mengganti nama file gambar
            'slug' => 'content-creator-edukasi',
        ]);

        // Mentor Bootcamp
        SubCategory::create([
            'category_id' => 6,
            'name' => 'Mentor Bootcamp',
            'image' => 'categories/mentor-bootcamp.png', // Anda bisa mengganti nama file gambar
            'slug' => 'mentor-bootcamp',
        ]);

        // Trainer Soft Skill
        SubCategory::create([
            'category_id' => 6,
            'name' => 'Trainer Soft Skill',
            'image' => 'categories/trainer-soft-skill.png', // Anda bisa mengganti nama file gambar
            'slug' => 'trainer-soft-skill',
        ]);

        SubCategory::create([
            'category_id' => 7,
            'name' => 'Admin Toko Online',
            'image' => 'categories/admin-toko-online.png',
            'slug' => 'admin-toko-online',
        ]);

        SubCategory::create([
            'category_id' => 7,
            'name' => 'Marketplace Specialist',
            'image' => 'categories/marketplace-specialist.png',
            'slug' => 'marketplace-specialist',
        ]);

        SubCategory::create([
            'category_id' => 7,
            'name' => 'Customer Service',
            'image' => 'categories/customer-service.png',
            'slug' => 'customer-service',
        ]);

        SubCategory::create([
            'category_id' => 7,
            'name' => 'Product Listing',
            'image' => 'categories/product-listing.png',
            'slug' => 'product-listing',
        ]);

        SubCategory::create([
            'category_id' => 7,
            'name' => 'Inventory Management',
            'image' => 'categories/inventory-management.png',
            'slug' => 'inventory-management',
        ]);

        SubCategory::create([
            'category_id' => 8,
            'name' => 'Mechanical Engineer',
            'image' => 'categories/mechanical-engineer.png',
            'slug' => 'mechanical-engineer',
        ]);

        SubCategory::create([
            'category_id' => 8,
            'name' => 'Electrical Engineer',
            'image' => 'categories/electrical-engineer.png',
            'slug' => 'electrical-engineer',
        ]);

        SubCategory::create([
            'category_id' => 8,
            'name' => 'Civil Engineer',
            'image' => 'categories/civil-engineer.png',
            'slug' => 'civil-engineer',
        ]);

        SubCategory::create([
            'category_id' => 8,
            'name' => 'CAD Drafter',
            'image' => 'categories/cad-drafter.png',
            'slug' => 'cad-drafter',
        ]);

        SubCategory::create([
            'category_id' => 8,
            'name' => 'Quality Control',
            'image' => 'categories/quality-control.png',
            'slug' => 'quality-control',
        ]);

        SubCategory::create([
            'category_id' => 9,
            'name' => 'Agribisnis',
            'image' => 'categories/agribisnis.png',
            'slug' => 'agribisnis',
        ]);

        SubCategory::create([
            'category_id' => 9,
            'name' => 'Ahli Lingkungan',
            'image' => 'categories/ahli-lingkungan.png',
            'slug' => 'ahli-lingkungan',
        ]);

        SubCategory::create([
            'category_id' => 9,
            'name' => 'Teknologi Pangan',
            'image' => 'categories/teknologi-pangan.png',
            'slug' => 'teknologi-pangan',
        ]);

        SubCategory::create([
            'category_id' => 9,
            'name' => 'Peneliti Lapangan',
            'image' => 'categories/peneliti-lapangan.png',
            'slug' => 'peneliti-lapangan',
        ]);

        SubCategory::create([
            'category_id' => 10,
            'name' => 'Analis Kesehatan',
            'image' => 'categories/analis-kesehatan.png',
            'slug' => 'analis-kesehatan',
        ]);

        SubCategory::create([
            'category_id' => 10,
            'name' => 'Asisten Apoteker',
            'image' => 'categories/asisten-apoteker.png',
            'slug' => 'asisten-apoteker',
        ]);

        SubCategory::create([
            'category_id' => 10,
            'name' => 'Peneliti Lab',
            'image' => 'categories/peneliti-lab.png',
            'slug' => 'peneliti-lab',
        ]);

        SubCategory::create([
            'category_id' => 10,
            'name' => 'Teknisi Medis',
            'image' => 'categories/teknisi-medis.png',
            'slug' => 'teknisi-medis',
        ]);
    }
}
