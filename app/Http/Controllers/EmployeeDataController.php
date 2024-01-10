<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\AdditionalDetail;


class EmployeeDataController extends Controller
{
    public function index()
    {
        $employees = User::all(); // Assuming you have a User model
        $additionalDetails = AdditionalDetail::first();

        return view('index-admin', compact('additionalDetails'));
    }
    public function showUpdateTotalEarnForm()
    {
        $additionalDetails = AdditionalDetail::first();
    
        if (!$additionalDetails) {
            $additionalDetails = new AdditionalDetail();
        }
    
        return view('update-earning', compact('additionalDetails'));
    }
    
    public function updateTotalEarn(Request $request)
    {
        $additionalDetails = AdditionalDetail::first();
    
        if (!$additionalDetails) {
            AdditionalDetail::create($request->all());
        } else {
            $additionalDetails->update($request->all());
        }
    
        return redirect()->back()->with('success', 'Total Earn updated successfully');
    }
    
    public function updateTotalSpent(Request $request)
    {
        $additionalDetails = AdditionalDetail::first();
    
        if (!$additionalDetails) {
            AdditionalDetail::create($request->all());
        } else {
            $additionalDetails->update($request->all());
        }
    
        return redirect()->back()->with('success', 'Total Spent updated successfully');
    }

    public function showUpdateTotalSalariesForm()
    {
        $additionalDetails = AdditionalDetail::first();

        if (!$additionalDetails) {
            $additionalDetails = new AdditionalDetail();
        }

        return view('update-earning', compact('additionalDetails'));
    }

    public function updateTotalSalaries(Request $request)
{
    $additionalDetails = AdditionalDetail::first();

    if (!$additionalDetails) {
        $additionalDetails = new AdditionalDetail();
    }

    // Assuming you have validation rules, you might want to validate the input here
    $additionalDetails->total_salaries = $request->input('total_salaries');
    $additionalDetails->save();

    return redirect()->back()->with('success', 'Total Salaries updated successfully');
}


}