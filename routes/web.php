<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SuperAdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');


Route::get('/user-register', [LoginController::class, 'showRegisterForm'])->name('register');
Route::post('/user-register', [LoginController::class, 'register']);

// this page show to only super admin not other roles

Route::get('/forgot-password', function () {
    if (Auth::check() && Auth::user()->role === 'super_admin') {
        return view('forgot-password');
    } else {
        return view('404');
    }
})->name('forgot-password')->middleware('auth');

/////////////////////////////////////////////////////

Route::get('/user-register', function () {
    return view('register');
});
// Route::get('/', function () {
//     return view('index');
// });

Route::fallback(function () {
    return view('404');
});

Route::get('/blank', function () {
    return view('blank');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/buttons', function () {
    return view('buttons');
});

Route::get('/cards', function () {
    return view('cards');
});

Route::get('/charts', function () {
    return view('charts');
});

Route::get('/login', function () {
    return view('login');
});



Route::get('/tables', function () {
    return view('tables');
});