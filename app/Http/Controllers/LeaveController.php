<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;

class LeaveController extends Controller
{
    public function index()
    {
        // Retrieve the leave data and any other required data from your database
        $leaveData = Leave::all(); // Assuming you have a Leave model
        
        // Pass the data to the 'leave.blade.php' view
        return view('leave', compact('leaveData'));
    }
}
