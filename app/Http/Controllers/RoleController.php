<?php

namespace App\Http\Controllers;

use App\User; 
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $employees = User::all();

        return view('roles', compact('employees')); 
    }

    public function update(Request $request)
    {
        $request->validate([
            'role' => 'required|array',
            'role.*' => 'string',
        ]);

        $data = $request->only(['role']);

        foreach ($data['role'] as $index => $role) {
            $employee = User::find($request->input('id.' . $index));
            if ($employee) {
                $employee->update([
                    'role' => $role,
                ]);
            }
        }

        return redirect()->route('roles.index');
    }
}
