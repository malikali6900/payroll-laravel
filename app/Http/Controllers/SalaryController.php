<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Salary;

class SalaryController extends Controller
{
    public function create()
    {
        $employees = User::all(); // Fetch all employees from the users table
        return view('salary.create', compact('employees'));

        
    }
    public function getSalaryDetails($id)
    {
        $salary = Salary::where('employee_id', $id)->first();

        return response()->json($salary);
    }

    public function store(Request $request)
{
    // Validation rules
    $request->validate([
        'employee_id' => 'required|exists:users,id',
        'salary_amount' => 'required_if:allowance,bonus',
        'allowance' => 'required_if:salary_amount,bonus',
        'bonus' => 'required_if:salary_amount,allowance',
    ]);

    // Update or create the salary
    Salary::updateOrCreate(
        ['employee_id' => $request->input('employee_id')],
        [
            'name' => User::find($request->input('employee_id'))->name,
            'salary_amount' => $request->input('salary_amount', 0),
            'allowance' => $request->input('allowance', 0),
            'bonus' => $request->input('bonus', 0),
        ]
    );

    // Store employee details in the session for display in the success message
    $employee = User::find($request->input('employee_id'));
    $request->session()->flash('employee_name', $employee->name);
    $request->session()->flash('salary_amount', $request->input('salary_amount'));
    $request->session()->flash('allowance', $request->input('allowance'));
    $request->session()->flash('bonus', $request->input('bonus'));

    return redirect()->route('salary.create')->with('success', 'Salary, Allowance, and Bonus updated successfully.');
}
}
