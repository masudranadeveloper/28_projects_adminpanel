<?php

use Illuminate\Support\Facades\Route;

// users
use App\Http\Controllers\frontend\users\users_frontend_accounts_controller;
use App\Http\Controllers\frontend\users\users_frontend_deshbord_controller;

// admin
use App\Http\Controllers\frontend\admin\admin_frontend_accounts_Controller;
use App\Http\Controllers\frontend\admin\admin_frontend_users_Controller;
use App\Http\Controllers\frontend\admin\admin_frontend_setting_Controller;
use App\Http\Controllers\frontend\admin\admin_frontend_reseller_controller;
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
    Route::get('/', [admin_frontend_users_Controller::class, 'users_home_controller']) -> name('users_home_web');
});

Route::get('accounts', [users_frontend_accounts_controller::class, 'users_accounts_controller']) -> name('users_accounts_web');


// admin
Route::prefix('admin')->group(function () {
    Route::get('', [admin_frontend_accounts_Controller::class, 'admin_users_all_controller']);
    Route::get('accounts', [admin_frontend_accounts_Controller::class, 'admin_accounts_controller']) -> name('admin_accounts_web');

    Route::middleware(['admin'])->group(function () {

        // users
        Route::prefix('users')->group(function () {
            Route::get('update/{id}', [admin_frontend_users_Controller::class, 'admin_users_update_controller']) -> name('users.admin_update_web');
            Route::get('add', [admin_frontend_users_Controller::class, 'admin_users_add_controller']) -> name('users.admin_add_web');
            Route::get('all', [admin_frontend_users_Controller::class, 'admin_users_all_controller']) -> name('users.admin_all_web');
            Route::get('ban', [admin_frontend_users_Controller::class, 'admin_users_ban_controller']) -> name('users.admin_ban_web');
        });

        // reseller
        Route::prefix('reseller')->group(function () {
            Route::get('update/{id}', [admin_frontend_reseller_controller::class, 'admin_reseller_update_controller']) -> name('reseller.admin_update_web');
            Route::get('add', [admin_frontend_reseller_controller::class, 'admin_reseller_add_controller']) -> name('reseller.admin_add_web');
            Route::get('all', [admin_frontend_reseller_controller::class, 'admin_reseller_all_controller']) -> name('reseller.admin_all_web');
            Route::get('ban', [admin_frontend_reseller_controller::class, 'admin_reseller_ban_controller']) -> name('reseller.admin_ban_web');
        });

        Route::prefix('settings')->group(function () {
            Route::get('products', [admin_frontend_setting_Controller::class, 'admin_settings_products_controller']) -> name('settings.admin_products_web');
            Route::get('products_add', [admin_frontend_setting_Controller::class, 'admin_settings_products_add_controller']) -> name('settings.admin_products_add_web');
            Route::get('products_update/{id}', [admin_frontend_setting_Controller::class, 'admin_settings_products_update_controller']) -> name('settings.admin_products_update_web');
            Route::get('contact', [admin_frontend_setting_Controller::class, 'admin_settings_contact_controller']) -> name('settings.admin_contact_web');
            Route::get('slider', [admin_frontend_setting_Controller::class, 'admin_settings_slider_controller']) -> name('settings.admin_slider_web');
            Route::get('slider_add', [admin_frontend_setting_Controller::class, 'admin_settings_slider_add_controller']) -> name('settings.admin_slider_add_web');
        });

    });
});
