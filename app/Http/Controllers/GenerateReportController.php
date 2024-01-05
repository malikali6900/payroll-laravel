<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Salary;
use App\User;

class GenerateReportController extends Controller
{
    public function showForm()
    {
        $distinctMonths = Salary::distinct()->pluck('month');
        $distinctYears = Salary::distinct()->pluck('year');
        return view('generate-report', compact('distinctMonths', 'distinctYears'));
    }

    public function generate(Request $request)
    {
        // Fetch data based on parameters
        $users = User::where('created_at', '>', $request->input('start_date'))
            ->where('created_at', '<', $request->input('end_date'))
            ->get();

        // Generate report (example: using Laravel Excel)
        return \Excel::download(new UserReportExport($users), 'user_report.xlsx');
    }

    public function showAllSalaries(Request $request)
    {
        // Validate the form data
        $request->validate([
            'reportType' => 'required|string|in:monthly,yearly',
            'month' => 'required_if:reportType,monthly|string|max:255',
            'year' => 'required_if:reportType,yearly|numeric',
        ]);

        // Fetch all salaries based on the selected report type, month, and year
        $reportType = $request->input('reportType');

        if ($reportType === 'monthly') {
            $month = $request->input('month');
            $year = $request->input('year');
            $salaries = Salary::with('employee')
                ->where('month', $month)
                ->where('year', $year)
                ->get();
        } elseif ($reportType === 'yearly') {
            $year = $request->input('year');
            $salaries = Salary::with('employee')
                ->where('year', $year)
                ->get();
        } else {
            // Invalid report type
            return redirect()->back()->with('error', 'Invalid report type selected.');
        }
        // Calculate deductions for each salary
        foreach ($salaries as $salary) {
            // Check if the employee has attendances
            if ($salary->employee->attendances) {
                // Assuming you have a 'total_absent' field in the 'attendances' table
                $totalAbsent = $salary->employee->attendances->sum('total_absent') ?? 0;
            } else {
                $totalAbsent = 0;
            }
    
            // Your deduction logic here
            $deductionPerAbsent = $salary->salary_amount / 30; // Assuming 1 day's salary deduction for each absent
            $deduction = $deductionPerAbsent * $totalAbsent;
    
            // Assign the calculated deduction to the salary model
            $salary->deduction = $deduction;
        }

        return view('salary.index', ['salaries' => $salaries, 'reportType' => ucfirst($reportType) . ' Report']);
    }
}