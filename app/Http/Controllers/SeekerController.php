<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeekerController extends Controller
{
    public function index()
    {
        return view('user.seeker.dashboardSeeker');
    }
}
