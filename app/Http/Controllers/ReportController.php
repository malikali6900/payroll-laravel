<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function showMonthlySalaries(Request $request)
    {
        // Validate the form data
        $request->validate([
            'month' => 'required|string|max:255',
        ]);

        // Fetch data based on the selected month
        $month = $request->input('month');
        $salaries = Salary::where('month', $month)->get();

        // Pass the data to the view
        return view('generate-report', ['salaries' => $salaries, 'reportType' => 'Monthly Report']);
    }

    public function showYearlySalaries(Request $request)
    {
        // Validate the form data
        $request->validate([
            'year' => 'required|numeric',
        ]);

        // Fetch data based on the selected year
        $year = $request->input('year');
        $salaries = Salary::where('year', $year)->get();

        // Pass the data to the view
        return view('generate-report', ['salaries' => $salaries, 'reportType' => 'Yearly Report']);
    }
}