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
            // User is already authenticated, show alert and log them out
            Auth::logout();
            return redirect('/login')->with('status', 'You will be logged out to login again.');
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

        if (Auth::attempt($credentials)) {
            // Authentication successful
            return redirect('/tables'); // Replace '/dashboard' with the desired destination URL after successful login
        } else {
            // Authentication failed
            return back()->withErrors(['invalid' => 'The email and password do not match. Please try again.']);
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
              'role' => 'required'


            ]
            );
        User::create(
            [
                'name' => $request->name,
                'last_name' => $request->last_name,  
                'email' => $request->email,
                'password' => \Hash::make($request->password),
                'role' => $request->role,
            ]
            );

            if (Auth::attempt($request->only('email','password'))) {
            // Authentication passed
            return redirect('/tables'); // Replace '/dashboard' with the desired destination URL after successful login
            } else {
                // Authentication failed
                return back()->withErrors(['message' => 'Invalid credentials']);
            }
        // print_r($request -> all());
    }
}


