<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = User::all(); // Assuming you have a User model

        return view('employee', compact('employees'));
    }
    public function update(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|array',
            'name.*' => 'required', // Ensure all 'name' elements are required
            'designation' => 'array',
        ]);

        $names = $request->input('name');
        $designations = $request->input('designation');

        // Loop through the input data and update the employees in the database
        foreach ($names as $index => $name) {
            // Ensure 'name' is not empty before updating
            if (!empty($name)) {
                $employee = User::find($index + 1); // Assuming employee IDs start from 1
                if ($employee) {
                    $employee->name = $name;
                    // You can also add similar validation for 'designation' if required
                    if (isset($designations[$index])) {
                        $employee->designation = $designations[$index];
                    }
                    $employee->save();
                }
            }
        }

        // Redirect back to the employee list or wherever you want
        return redirect('/employee');
    }


}
