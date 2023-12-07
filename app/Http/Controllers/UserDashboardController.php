<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Salary;

class UserDashboardController extends Controller
{
    public function index()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Get the associated salary
        $salary = $user->salary;

        return view('index-user', compact('salary'));
    }
}
