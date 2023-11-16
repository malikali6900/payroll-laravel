<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\AttendanceImport;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceController extends Controller
{
    public function showForm()
    {
        return view('upload-attendance-form');
    }

    public function uploadAttendance(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new AttendanceImport, $request->file('file'));

        return redirect()->back()->with('success', 'Attendance records imported successfully.');
        dd('import');
    }

    // Add other methods as needed
}