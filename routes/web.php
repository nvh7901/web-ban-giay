<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('check.admin.login')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    });

    // Login Admin
    Route::prefix('/login')->group(function () {
        Route::get('/', [AdminController::class, 'getLogin'])->withoutMiddleware('check.admin.login');
        Route::post('', [AdminController::class, 'postLogin'])->withoutMiddleware('check.admin.login');
    });
    // Logout Admin
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // Profile Admin
    Route::prefix('profile')->group(function () {
        Route::get('/', [AdminProfileController::class, 'adminProfile'])->name('admin.profile');
        Route::get('/edit', [AdminProfileController::class, 'adminProfileEdit'])->name('admin.profile.edit');
        Route::post('/update', [AdminProfileController::class, 'adminProfileUpdate'])->name('admin.profile.update');
        Route::get('/edit-password', [AdminProfileController::class, 'adminProfileEditPassword'])->name('admin.password.edit');
        Route::post('/update-password', [AdminProfileController::class, 'adminProfileUpdatePassword'])->name('admin.password.update');
    });
});
