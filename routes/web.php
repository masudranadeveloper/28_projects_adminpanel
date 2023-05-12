<?php

use Illuminate\Support\Facades\Route;

// users
use App\Http\Controllers\frontend\users\users_frontend_accounts_controller;
use App\Http\Controllers\frontend\users\users_frontend_deshbord_controller;

// admin
use App\Http\Controllers\frontend\admin\admin_frontend_accounts_Controller;
use App\Http\Controllers\frontend\admin\admin_frontend_users_Controller;
use App\Http\Controllers\frontend\admin\admin_frontend_setting_Controller;
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

Route::middleware(['users'])->group(function () {
    Route::get('/', [users_frontend_deshbord_controller::class, 'users_home_controller']) -> name('users_home_web');
});

Route::get('accounts', [users_frontend_accounts_controller::class, 'users_accounts_controller']) -> name('users_accounts_web');


// admin
Route::prefix('admin')->group(function () {
    Route::get('accounts', [admin_frontend_accounts_Controller::class, 'admin_accounts_controller']) -> name('admin_accounts_web');

    Route::middleware(['admin'])->group(function () {
        Route::get('settings', [admin_frontend_setting_Controller::class, 'admin_settings_controller']) -> name('admin_settings_web');

        // users
        Route::prefix('users')->group(function () {
            Route::get('update/{id}', [admin_frontend_users_Controller::class, 'admin_users_update_controller']) -> name('users.admin_update_web');
            Route::get('add', [admin_frontend_users_Controller::class, 'admin_users_add_controller']) -> name('users.admin_add_web');
            Route::get('all', [admin_frontend_users_Controller::class, 'admin_users_all_controller']) -> name('users.admin_all_web');
            Route::get('ban', [admin_frontend_users_Controller::class, 'admin_users_ban_controller']) -> name('users.admin_ban_web');
        });
    });
});
