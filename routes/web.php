<?php

use App\Http\Controllers\Admin\ContactCompanyController;
use App\Http\Controllers\Admin\ContactContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Auth::routes(['register' => false]);

Route::get('/book', [WelcomeController::class, 'book'])->name('book');
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register_store');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dash', [DashboardController::class, 'index'])->name('dash');
    Route::get('/update', [DashboardController::class, 'edit']);
    Route::put('/update', [DashboardController::class, 'update'])->name('prof_update');
    Route::post('/pic', [DashboardController::class, 'pic'])->name('pic');

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['admin']], function () {
        
        Route::get('/', [HomeController::class, 'index'])->name('home');

        // Permissions
        Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

        // Roles
        Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

        // Users
        Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

        // Contact Company
        Route::resource('contact-companies', ContactCompanyController::class, ['except' => ['store', 'update', 'destroy']]);

        // Contact Contacts
        Route::resource('contact-contacts', ContactContactController::class, ['except' => ['store', 'update', 'destroy']]);

        // Transactions
        Route::resource('transactions', TransactionController::class, ['except' => ['store', 'update', 'destroy']]);
    });
});
