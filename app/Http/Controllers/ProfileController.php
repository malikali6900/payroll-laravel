<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed', // Add any password validation rules you need
        ]);

        // Update the user's name
        auth()->user()->update(['name' => $request->input('name')]);

        // Update the user's password if provided
        if ($request->filled('password')) {
            // Hash the new password
            $hashedPassword = Hash::make($request->input('password'));

            // Update the user's password in the database
            auth()->user()->update(['password' => $hashedPassword]);
        }

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
