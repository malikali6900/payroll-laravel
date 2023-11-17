<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Salary;
use App\Attendance;

class SalaryCalculationController extends Controller
{
    public function showForm()
    {
        $salaries = Salary::all();
        return view('calculate-salary', compact('salaries'));
    }

    public function calculate(Request $request)
    {
        // Validate the form data
        $request->validate([
            'user_id' => 'required|exists:salaries,employee_id',
            // Add other validation rules as needed
        ]);

        // Your logic to calculate salary based on the selected user_id
        $user = User::find($request->input('user_id'));
        $salary = Salary::where('employee_id', $user->id)->first(); // Assuming you have a salary record associated with the user

        // Fetch the total_absent value from the attendances table
        $totalAbsent = Attendance::where('employee_id', $user->id)->value('total_absent') ?? 0;

        // Calculate deduction amount based on total_absent (you can replace this with your own logic)
        $deductionPerAbsent = $salary->salary_amount / 30; // Assuming 1 day's salary deduction for each absent
        $deductions = $deductionPerAbsent * $totalAbsent;

        // Add logic to calculate allowances, bonuses, and total salary
        $allowances = $salary->allowance ?? 0;
        $bonuses = $salary->bonus ?? 0;
        $totalSalary = $salary->salary_amount + $allowances + $bonuses - $deductions;

        // Pass data to the view
        return view('show-calculate-salary', compact('user', 'salary', 'allowances', 'bonuses', 'deductions', 'totalSalary'));
    }
}