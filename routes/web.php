<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\AuthenticationController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Frontend\WishListController;
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

    // Brands
    Route::prefix('brand')->group(function () {
        Route::get('/', [BrandController::class, 'index'])->name('brand.index');
        Route::get('/create', [BrandController::class, 'create'])->name('brand.create');
        Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
        Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
        Route::post('/update/{id}', [BrandController::class, 'update'])->name('brand.update');
        Route::get('/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
    });

    // Category
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    });

    // Sub Category
    Route::prefix('sub-category')->group(function () {
        Route::get('/', [SubCategoryController::class, 'index'])->name('sub-category.index');
        Route::get('/create', [SubCategoryController::class, 'create'])->name('sub-category.create');
        Route::post('/store', [SubCategoryController::class, 'store'])->name('sub-category.store');
        Route::get('/edit/{id}', [SubCategoryController::class, 'edit'])->name('sub-category.edit');
        Route::post('/update/{id}', [SubCategoryController::class, 'update'])->name('sub-category.update');
        Route::get('/delete/{id}', [SubCategoryController::class, 'delete'])->name('sub-category.delete');
        // get dropdown sub-category
        Route::get('/{category_id}', [SubCategoryController::class, 'getDropdownSubCategory']);
    });

    // Product
    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

        Route::get('/in-active/{id}', [ProductController::class, 'inactive'])->name('product.inactive');
        Route::get('/active/{id}', [ProductController::class, 'active'])->name('product.active');
    });

    // Slider
    Route::prefix('slider')->group(function () {
        Route::get('/', [SliderController::class, 'index'])->name('slider.index');
        Route::get('/create', [SliderController::class, 'create'])->name('slider.create');
        Route::post('/store', [SliderController::class, 'store'])->name('slider.store');
        Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
        Route::post('/update/{id}', [SliderController::class, 'update'])->name('slider.update');
        Route::get('/delete/{id}', [SliderController::class, 'delete'])->name('slider.delete');

        Route::get('/in-active/{id}', [SliderController::class, 'inactive'])->name('slider.inactive');
        Route::get('/active/{id}', [SliderController::class, 'active'])->name('slider.active');
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
Route::prefix('forget-password')->group(function () {
    Route::get('/', [AuthenticationController::class, 'getForgetPassword'])->name('user.get.forget-password');
    Route::post('/', [AuthenticationController::class, 'postForgetPassword'])->name('user.post.forget-password');
});
// Reset Password
Route::prefix('reset-password')->group(function () {
    Route::get('/{token}', [AuthenticationController::class, 'getResetPassword']);
    Route::post('/', [AuthenticationController::class, 'postResetPassword'])->name('user.post.reset-password');
});

Route::prefix('language')->group(function () {
    Route::get('/vi', [LanguageController::class, 'viLanguage'])->name('language.vi');
    Route::get('/en', [LanguageController::class, 'enLanguage'])->name('language.en');
});

Route::prefix('product')->group(function () {
    Route::get('/detail/{id}/{slug}', [FrontendProductController::class, 'productDetail']);
    Route::get('/category/{id}/{slug}', [FrontendProductController::class, 'listCategoryProduct']);
    Route::get('/sub-category/{id}/{slug}', [FrontendProductController::class, 'listSubCategoryProduct']);
    Route::get('/modal/{id}', [FrontendProductController::class, 'modalViewProduct']);
});
Route::prefix('user')->middleware('check.user.login')->group(function () {
    Route::get('/dashboard', [IndexController::class, 'dashboard'])->name('user.dashboard');

    Route::prefix('profile')->group(function () {
        Route::get('/', [IndexController::class, 'userProfile'])->name('user.profile');
        Route::post('/', [IndexController::class, 'userProfileUpdate'])->name('user.profile.update');
    });

    Route::prefix('change-password')->group(function () {
        Route::get('/', [IndexController::class, 'getChangePassword'])->name('user.get.change-password');
        Route::post('/', [IndexController::class, 'postChangePassword'])->name('user.post.change-password');
    });
});

Route::prefix('cart')->group(function() {
    Route::post('/add/{id}', [CartController::class, 'addCart']);
    Route::get('/mini', [CartController::class, 'addMiniCart']);
    Route::get('/mini/remove/{rowId}', [CartController::class, 'removeMiniCart']);
});

Route::prefix('wishlist')->middleware('check.user.login')->group(function() {
    Route::post('/add/{id}', [WishListController::class, 'addWistList']);
    Route::get('/', [WishListController::class, 'index']);
    Route::get('/get-wishlist', [WishListController::class, 'getWishList']);
    Route::get('/remove/{id}', [WishListController::class, 'removetWishList']);
    
});
// ------------------- End Frontend ---------------