<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SalaryCalculationController;
use App\Http\Controllers\ShowCalculateSalaryController;

// Route::get('/upload-attendance', [AttendanceController::class, 'showForm']);
// Route::post('/upload-attendance', [AttendanceController::class, 'upload']);
Route::get('/calculate-salary', [SalaryCalculationController::class, 'showForm'])->name('calculate.salary.form');
Route::post('/calculate-salary', [SalaryCalculationController::class, 'calculate'])->name('calculate.salary');
Route::get('/show-calculate-salary', [ShowCalculateSalaryController::class, 'show'])->name('show.calculate.salary');


Route::get('/get-salary-details/{id}', 'SalaryController@getSalaryDetails')->name('get-salary-details');

Route::get('/salary/create', [SalaryController::class, 'create'])->name('salary.create');
Route::post('/salary/store', [SalaryController::class, 'store'])->name('salary.store');

Route::get('/upload-attendance', [AttendanceController::class, 'showForm']);
Route::post('/upload-attendance',[AttendanceController::class,'uploadAttendance'])->name('upload-attendance');

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
    Route::post('/updateDesignation/{id}', 'UserController@updateDesignation');

    // Route::get('/display-data', 'UserController@displayUserData');
// routes/web.php
// routes/web.php

Route::get('/apply-leave', 'LeaveController@applyLeaveForm')->name('apply-leave.form');
Route::post('/apply-leave', 'LeaveController@applyLeave')->name('apply-leave');


Route::get('/roles', 'RoleController@index')->name('roles.index');
Route::post('/roles/update', 'RoleController@update')->name('roles.update');

   
    Route::get('/employee', 'EmployeeController@index');
    Route::post('/employees/update', 'EmployeeController@update');
    Route::get('/leave', function () {
        return view('leave'); 
    });
    // Route::get('/calculate-sallery', function () {
    //     return view('calculate-sallery'); 
    // });



    Route::get('/profile', function () {
        return view('profile');
    });
    Route::get('/holidays', function () {
        return view('holidays');
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
// For Image Upload 
Route::post('/upload-image', 'ImageController@upload')->name('upload-image');
// For Image Update
Route::post('/update-image', 'ImageController@updateImage')->name('update-image');
// For Profile Update
Route::post('/update-profile', 'ProfileController@updateProfile')->name('update-profile');

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
