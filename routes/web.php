<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PmksController;
use App\Http\Controllers\PsksController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\User\ProfileController;
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

// Authentication Routes
Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login.index');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
    Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->middleware('guest')->name('forgot.index');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->middleware('guest')->name('forgot.store');
    Route::post('/logout', [LogoutController::class, 'store'])->name('logout.store');
});
Route::get('/reset-password', [ForgotPasswordController::class, 'reset'])->middleware('guest')->name('password.reset'); // namanya harus password.reset, hardcoded di laravel
Route::post('/reset-password', [ForgotPasswordController::class, 'change'])->middleware('guest')->name('password.change');
 
Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'auth.roles:is-admin,is-user'])->name('dashboard');

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'auth.roles:is-admin'])->name('admin.')->group(function () {
    Route::resource('/users', UserController::class);
});

// User route
Route::prefix('user')->middleware(['auth', 'auth.roles:is-admin,is-user'])->name('user.')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
});

// PMKS Routes
Route::resource('/pmks', PmksController::class)->middleware(['auth', 'auth.roles:is-admin,is-user']);


// Routes untuk alamat
Route::get('/address/kabupaten', [AddressController::class, 'kabupaten'])->middleware(['auth', 'auth.roles:is-admin,is-user'])->name('address.kabupaten');
Route::get('/address/kecamatan', [AddressController::class, 'kecamatan'])->middleware(['auth', 'auth.roles:is-admin,is-user'])->name('address.kecamatan');
Route::get('/address/kelurahan', [AddressController::class, 'kelurahan'])->middleware(['auth', 'auth.roles:is-admin,is-user'])->name('address.kelurahan');