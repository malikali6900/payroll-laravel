<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Salary;
use App\Attendance;
use Dompdf\Dompdf;
use Dompdf\Options;


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
    public function downloadSalarySlipPDF($id)
{
    // Fetch the salary details for the specified employee
    $salary = Salary::where('employee_id', $id)->first();

    if (!$salary) {
        // Handle the case where salary details are not found
        return redirect()->back()->with('error', 'Salary details not found for this employee.');
    }

    // Fetch additional data if needed (e.g., user details)
    $user = User::find($id);
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

    // Pass the necessary data to the PDF view
    $data = [
        'user' => $user,
        'salary' => $salary,
        'allowances' => $allowances,
        'bonuses' => $bonuses,
        'deductions' => $deductions,
        'totalSalary' => $totalSalary
        // Add other variables as needed
    ];

    // Generate PDF using Dompdf
    $pdf = $this->generateSalarySlipPDF($data);

    // Output PDF as a download
    return $pdf->stream('salary_slip.pdf');
}


private function generateSalarySlipPDF($data)
{
    // Instantiate Dompdf
    $dompdf = new Dompdf();

    // Load HTML content into Dompdf
    $html = view('salary_pdf', $data)->render();
    $dompdf->loadHtml($html);

    // Set Dompdf options
    $options = new Options();
    $options->set('isRemoteEnabled', true); // Allow loading of external images
    // You can set more options if needed
    $dompdf->setOptions($options);

    // Render PDF
    $dompdf->render();

    return $dompdf;
}
}