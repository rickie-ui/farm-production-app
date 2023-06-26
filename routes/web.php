<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\FarmerController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ProduceController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;

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

// Auth routes
Route::prefix('auth')->group(function () {

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
});

//Manage users and produce
Route::prefix('users')->group(function(){
     Route::get('/farmer', [FarmerController::class, 'index'] )->name('manage');
     Route::post('/farmer', [FarmerController::class, 'store'] );

     Route::get('/farmer/produce', [ProduceController::class, 'index'] )->name('produce');
     Route::post('/farmer/produce', [ProduceController::class, 'store'] );

     Route::get('/report', [ReportController::class, 'index'])->name('report');
});

///get edit farmer
Route::get('/farmer/{id}/profile', [ProfileController::class, 'index']);
//Edit farmer
Route::put('/farmer/{id}', [ProfileController::class, 'store']);
// Delete farmer
Route::delete('/farmer/{id}/manage', [ProfileController::class, 'destroy']);
