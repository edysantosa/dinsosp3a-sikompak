<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PsksController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('layouts.main');
// });

// Authentication
// Route::get('/login', [LoginController::class, 'index'])->name('login');
// Route::post('/login', [LoginController::class, 'store']);
// Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


// Authentication Routes
Route::prefix('auth')->name('auth.')->group(function () {
    Route::resource('/login', LoginController::class);
    Route::resource('/logout', LogoutController::class);
});

Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'auth.roles:is-admin,is-user'])->name('dashboard');

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'auth.roles:is-admin'])->name('admin.')->group(function () {
    Route::resource('/users', UserController::class);
});
