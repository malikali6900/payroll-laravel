<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;

class LeaveController extends Controller
{
    public function applyLeaveForm()
    {
        return view('apply-leave-form');
    }

    public function applyLeave(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string',
        ]);
        $user = auth()->user();
        Leave::create([
            'name' => $user->name, // Include the user's name
            'employee_id' => auth()->id(), // Assuming you are using authentication
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'reason' => $request->input('reason'),
            'status' => 'pending', // Default status, change it according to your needs
        ]);

        return redirect()->route('apply-leave.form')->with('success', 'Leave application submitted successfully.');
    }
}