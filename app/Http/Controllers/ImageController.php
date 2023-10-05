<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'user_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image file type and size
        ]);

        if ($request->file('user_img')) {
            $imagePath = $request->file('user_img')->store('user_images', 'public'); // Store the image

            // Update the user's 'user_img' column with the image path
            auth()->user()->update(['user_img' => $imagePath]);

            return redirect()->back()->with('success', 'Image uploaded successfully.');
        }

        return redirect()->back()->with('error', 'Image upload failed.');
    }
    public function updateImage(Request $request)
    {
        $request->validate([
            'user_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->file('user_img')) {
            // Delete the previous image if it exists
            $previousImagePath = auth()->user()->user_img;
            if ($previousImagePath) {
                Storage::disk('public')->delete($previousImagePath);
            }

            // Upload the new image
            $imagePath = $request->file('user_img')->store('user_images', 'public');

            // Update the user's 'user_img' column with the new image path
            auth()->user()->update(['user_img' => $imagePath]);

            return redirect()->back()->with('success', 'Image updated successfully.');
        }

        return redirect()->back()->with('error', 'No new image uploaded.');
    }

    public function deleteImage()
    {
        // Get the user's current image path
        $imagePath = auth()->user()->user_img;

        if ($imagePath) {
            // Delete the image from storage
            Storage::disk('public')->delete($imagePath);

            // Update the user's 'user_img' column to indicate no image
            auth()->user()->update(['user_img' => null]);

            return redirect()->back()->with('success', 'Image deleted successfully.');
        }

        return redirect()->back()->with('error', 'No image to delete.');
    }
}
