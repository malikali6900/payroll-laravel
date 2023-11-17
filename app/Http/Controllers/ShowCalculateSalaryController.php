<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowCalculateSalaryController extends Controller
{
    public function show()
    {
        return view('show-calculate-salary');
    }
}
