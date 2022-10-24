<?php

use App\Http\Controllers\Auth\LoginController;
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
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Authentication
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// PSKS
Route::get('/psks', [PsksController::class, 'index'])->name('psks');

// Test
Route::get('/settings/user', [TestController::class, 'index']);
Route::get('/settings/satu', [TestController::class, 'satu']);
Route::get('/settings/dua', [TestController::class, 'dua']);
Route::get('/settings/tiga', [TestController::class, 'tiga']);
