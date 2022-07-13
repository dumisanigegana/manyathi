<?php

use App\Http\Controllers\Admin\ContactCompanyController;
use App\Http\Controllers\Admin\ContactContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dash', [DashboardController::class, 'index'])->name('dash');

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
