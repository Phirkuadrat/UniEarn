<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeekerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userName = $user ? $user->name : 'Seeker';
        $summary = [
            'totalPortfolios' => 3, // Contoh data statis
            'totalApplications' => 2, // Contoh data statis
            'acceptedApplications' => 1, // Contoh data statis
        ];

        return view('user.seeker.dashboardSeeker', compact('userName', 'summary'));
    }

    /**
     * Menampilkan halaman portofolio seeker.
     */
    public function portfolios()
    {
        // Data Portofolio Statis
        $portfolios = collect([
            (object)[
                'id' => 1,
                'title' => 'Desain Aplikasi Mobile E-Commerce "ShopNow"',
                'description' => 'Prototipe UI/UX interaktif untuk aplikasi belanja online, dirancang dengan Figma dan fokus pada alur pengguna yang intuitif.',
                'category' => 'UI/UX Design'
            ],
            (object)[
                'id' => 2,
                'title' => 'Pengembangan Web Company Profile "GreenTech Solutions"',
                'description' => 'Website profil perusahaan responsif menggunakan HTML, CSS, dan JavaScript, menampilkan layanan dan portofolio perusahaan GreenTech.',
                'category' => 'Web Development'
            ],
            (object)[
                'id' => 3,
                'title' => 'Ilustrasi Digital untuk Kampanye Sosial "Jaga Bumi"',
                'description' => 'Serangkaian ilustrasi digital yang menarik dan informatif untuk meningkatkan kesadaran akan isu lingkungan.',
                'category' => 'Graphic Design'
            ]
        ]);

        return view('user.seeker.portfolios', compact('portfolios'));
    }


    public function applications()
    {
        // Data Aplikasi (Lamaran/Proyek yang Diambil) Statis
        $applications = collect([
            (object)[
                'id' => 1,
                'project_id' => 101,
                'project_title' => 'Pengembangan Fitur Live Chat untuk Platform Edukasi',
                'status' => 'accepted',
                'project_category' => 'Web Development', // Kategori Proyek
                'message' => 'Sangat antusias untuk berkontribusi dalam proyek ini.'
            ],
            (object)[
                'id' => 2,
                'project_id' => 102,
                'project_title' => 'Pembuatan Konten Media Sosial untuk Brand Fashion Lokal',
                'status' => 'pending',
                'project_category' => 'Digital Marketing', // Kategori Proyek
                'message' => 'Melampirkan portofolio terkait pembuatan konten.'
            ],
            (object)[
                'id' => 3,
                'project_id' => 103,
                'project_title' => 'Riset Pasar untuk Produk Aplikasi Kesehatan Mental',
                'status' => 'rejected',
                'project_category' => 'Market Research', // Kategori Proyek
                'message' => 'Terima kasih atas kesempatannya.'
            ],
             (object)[
                'id' => 4,
                'project_id' => 104,
                'project_title' => 'UI Redesign Aplikasi Mobile Travel',
                'status' => 'accepted',
                'project_category' => 'UI/UX Design', // Kategori Proyek
                'message' => 'Siap untuk memulai diskusi lebih lanjut.'
            ]
        ]);

        return view('user.seeker.applications', compact('applications'));
    }
    // public function createPortfolio() { return view('user.seeker.portfolio-create'); }
    // public function storePortfolio(Request $request) { /* ... */ }
}