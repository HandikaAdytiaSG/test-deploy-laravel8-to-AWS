<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard'); 

Route::post('/dashboard-add', [DashboardController::class, 'tambahUser']);  // Tambah User 
Route::delete('/dashboard-delete/{id}', [DashboardController::class, 'hapusUser']);  // Hapus User 

Route::get('/dashboard/profile-edit/{id}', [DashboardController::class, 'viewEdit']);  // View Edit User 
Route::put('/dashboard/profile-edit/{id}', [DashboardController::class, 'editUser']);  // Edit User 
