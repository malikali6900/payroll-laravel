<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SuperAdminController;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Group routes that require authentication
Route::middleware(['auth'])->group(function () {
    
    Route::get('/forgot-password', 'ForgotPasswordController@showForgotPasswordForm')->name('forgot-password');
    // Define routes that require authentication and the super_admin role
    Route::get('/user-register', [LoginController::class, 'showRegisterForm'])->name('register')
        ->middleware('role:super_admin');
    
    Route::post('/user-register', [LoginController::class, 'register'])->middleware('role:super_admin');

    // Routes that are only accessed by super admin  
    Route::get('/forgot-password', function () {
        if (Auth::user()->role === 'super_admin') {
            return view('forgot-password');
        } else {
            return view('404');
        }
    })->name('forgot-password');

    // Add more authenticated routes here
    // For example:
    // Route::get('/dashboard', [DashboardController::class, 'index']);
    // Route::get('/profile', [ProfileController::class, 'index']);
    Route::get('/profile', function () {
        return view('profile');
    });

    // Seperate dashboard for super_admin and other users
    Route::get('/index', function () {
        if (Auth::user()->role === 'super_admin') {
            return view('/index'); // get view for super_admin ==> role
        } elseif (Auth::user()->role === 'user') {
            return view('tables'); // get view for user ==> role
        } else {
            return view('404'); // Handle other roles or scenarios as needed
        }
    })->name('dashboard');
    // ------------------------------------------------------------------------
    // Logout route to main-page
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');
});


Route::get('/', function () {
    return view('home');
});
Route::get('/welcome', function () {
    return view('welcome');
});

// Route any other url to 404
Route::fallback(function () {
    return view('404-test');
});