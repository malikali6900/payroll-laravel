<?php


namespace App\Http\Controllers\Auth; // Use the correct namespace for the LoginController

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth; // Add the Auth facade here

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            // User is already authenticated, redirect to tables page
            return redirect('/index-admin');
        }
    
        return view('login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'email',
                Rule::exists('users'), // Assuming your users table is named 'users'
            ],
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication successful, redirect to the tables page
            return redirect('/index-admin');
        } else {
            // Authentication failed, redirect back with errors
            return redirect()->back()->withErrors(['message' => 'Invalid credentials']);
        }
    }

    
    public function showRegisterForm()
    {
        return view('register');
    }
    
    public function register(Request $request)
    {
        $request -> validate(
            [
              'name' => 'required',  
              'email' => 'required|unique:users|email',
              'password' => 'required|confirmed',
              'password_confirmation' => 'required',
              'role' => 'required',
              'designation' => 'required',
            ]
            );
        User::create(
            [
                'name' => $request->name,
                'last_name' => $request->last_name,  
                'email' => $request->email,
                'password' => \Hash::make($request->password),
                'role' => $request->role,
                'designation' => $request->designation, 
            ]
            );

            if (Auth::attempt($request->only('email','password'))) {
            // Authentication passed
            return redirect('/index-admin'); // Replace '/dashboard' with the desired destination URL after successful login
            } else {
                // Authentication failed
                return back()->withErrors(['message' => 'Invalid credentials']);
            }
        // print_r($request -> all());
    }
}


