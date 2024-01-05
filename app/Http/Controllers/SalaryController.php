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
            'month' => 'required|string|max:255',
            'year' => 'required|numeric',
        ]);

        // Find the associated user
        $user = User::findOrFail($request->input('employee_id'));

        // Update or create the salary
        $salary = Salary::updateOrCreate(
            ['employee_id' => $user->id],
            [
                'name' => $user->name,
                'salary_amount' => $request->input('salary_amount', 0),
                'allowance' => $request->input('allowance', 0),
                'bonus' => $request->input('bonus', 0),
                'month' => $request->input('month'), // Updated this line
                'year' => $request->input('year'),   // Updated this line
            ]
        );

        // Flash success message to session
        $request->session()->flash('employee_name', $user->name);
        $request->session()->flash('salary_amount', $request->input('salary_amount'));
        $request->session()->flash('allowance', $request->input('allowance'));
        $request->session()->flash('bonus', $request->input('bonus'));
        $request->session()->flash('month', $request->input('month'));
        $request->session()->flash('year', $request->input('year'));
        

        return redirect()->route('salary.create')->with('success', 'Salary, Allowance, and Bonus updated successfully.');
    }
}
