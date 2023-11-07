<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\AuthenticationController;
use App\Http\Controllers\Frontend\IndexController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ------------------- Admin ---------------------
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
// -------------------End Admin -------------------

// ------------------- Frontend -------------------
Route::get('/', [IndexController::class, 'index']);
// Login
Route::prefix('/login')->group(function () {
    Route::get('/', [AuthenticationController::class, 'getUserLogin'])->withoutMiddleware('check.user.login');
    Route::post('/', [AuthenticationController::class, 'postUserLogin'])->withoutMiddleware('check.user.login');
});
// Logout
Route::get('/log-out', [AuthenticationController::class, 'userLogout'])->name('user.log-out');
// Register
Route::prefix('/register')->group(function () {
    Route::get('/', [AuthenticationController::class, 'getUserRegister']);
    Route::post('/', [AuthenticationController::class, 'postUserRegister'])->name('user.register');
});
// Forget Password
Route::prefix('forget-password')->group(function() {
    Route::get('/', [AuthenticationController::class, 'getForgetPassword'])->name('user.get.forget-password');
    Route::post('/', [AuthenticationController::class, 'postForgetPassword'])->name('user.post.forget-password');
});
// Reset Password
Route::prefix('reset-password')->group(function() {
    Route::get('/{token}', [AuthenticationController::class, 'getResetPassword']);
    Route::post('/', [AuthenticationController::class, 'postResetPassword'])->name('user.post.reset-password');
});

Route::prefix('user')->middleware('check.user.login')->group(function() {
    Route::get('/dashboard', [IndexController::class, 'dashboard'])->name('user.dashboard');

    Route::prefix('profile')->group(function() {
        Route::get('/', [IndexController::class, 'userProfile'])->name('user.profile');
        Route::post('/', [IndexController::class, 'userProfileUpdate'])->name('user.profile.update');
    });

    Route::prefix('change-password')->group(function() {
        Route::get('/', [IndexController::class, 'getChangePassword'])->name('user.get.change-password');
        Route::post('/', [IndexController::class, 'postChangePassword'])->name('user.post.change-password');
    });
});
// ------------------- End Frontend ---------------