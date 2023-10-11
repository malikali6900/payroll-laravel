<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function displayUserData()
    {
        // Retrieve the "name" and "role" columns from the "users" table

        $userData = DB::table('users')->select('id', 'name', 'designation')->get();

        // Pass the data to a view
        return view('designation', ['userData' => $userData]);
    }
    public function updateDesignation(Request $request, $id)
    {
        // You can add validation and permissions checks here
    
        $user = User::find($id);
        $user->designation = $request->input('designation');
        $user->save();
    
        return response()->json(['message' => 'Designation updated successfully']);
    }

}
