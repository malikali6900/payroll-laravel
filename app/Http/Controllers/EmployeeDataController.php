<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class EmployeeDataController extends Controller
{
    public function index()
    {
        $employees = User::all(); // Assuming you have a User model

        return view('index', compact('employees'));
    }
}