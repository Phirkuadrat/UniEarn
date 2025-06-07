<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleSelectionController extends Controller 
{
    public function store(Request $request)
    {
        $user = Auth::user();

        if (!($user instanceof \App\Models\User)) {
            $user = \App\Models\User::find($user->id);
        }

        if ($request->input('role') === 'seeker') {
            $validatedData = $request->validate([
                'role' => 'required|in:seeker,recruiter',
                'phone' => 'nullable|string|max:20',
                'address' => 'nullable|string|max:500',
                'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
                'bio' => 'nullable|string|max:1000',
            ]);
        } elseif ($request->input('role') === 'recruiter') {
            $validatedData = $request->validate([
                'role' => 'required|in:seeker,recruiter',
                'company_name' => 'required|string|max:255',
                'company_website' => 'nullable|url|max:255',
                'company_phone' => 'nullable|string|max:20',
                'company_address' => 'nullable|string|max:500',
                'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            ]);
        } else {
            return redirect()->route('dashboard')->with('error', 'Invalid role selected.');
        }

        $role = $validatedData['role'];
        $user->role = $role;
        $user->save();

        if ($role === 'seeker') {
            $dataToCreate['phone'] = $validatedData['phone'] ?? null;
            $dataToCreate['address'] = $validatedData['address'] ?? null;
            $dataToCreate['bio'] = $validatedData['bio'] ?? null;

            if ($request->hasFile('profile_picture')) {
                $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');
                $dataToCreate['profile_picture'] = $imagePath;
            }

            $user->seeker()->updateOrCreate(
                ['user_id' => $user->id], 
                $dataToCreate             
            );

            return redirect()->route('seeker.dashboard')->with('success', 'Seeker profile saved successfully and role assigned.');
        } elseif ($role === 'recruiter') {
            $dataToCreate['company_name'] = $validatedData['company_name'] ?? null;
            $dataToCreate['company_website'] = $validatedData['company_website'] ?? null;
            $dataToCreate['company_phone'] = $validatedData['company_phone'] ?? null;
            $dataToCreate['company_address'] = $validatedData['company_address'] ?? null;

            if ($request->hasFile('company_logo')) {
                $logoPath = $request->file('company_logo')->store('company_logos', 'public');
                $dataToCreate['company_logo'] = $logoPath;
            }

            $user->recruiter()->updateOrCreate(
                ['user_id' => $user->id], 
                $dataToCreate           
            );

            return redirect()->route('recruiter.dashboard')->with('success', 'Recruiter profile saved successfully and role assigned.'); // Sesuaikan dengan route dashboard recruiter Anda
        }
    }
}
