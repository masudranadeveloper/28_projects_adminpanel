<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// users
use App\Http\Controllers\backend\users\users_backend_account_controller;
use App\Http\Controllers\backend\users\users_backend_home_controller;

// admin
use App\Http\Controllers\backend\admin\admin_backend_users_controller;
use App\Http\Controllers\backend\admin\admin_backend_accounts_controller;
use App\Http\Controllers\backend\admin\admin_backend_settings_controller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

 // users
 Route::prefix('users')->group(function () {
    Route::post('login', [users_backend_account_controller::class, 'users_users_login_controller']) -> name('users_users_login_api');
    Route::GET('logout', [users_backend_account_controller::class, 'users_users_logout_controller']) -> name('users_users_logout_api');
    // users
    Route::prefix('home')->group(function () {
        Route::get('content18', [users_backend_home_controller::class, 'users_home_content18_controller']) -> name('users_home_content18_api');
        Route::post('getexpired_time', [users_backend_home_controller::class, 'users_home_getexpired_time_controller']) -> name('users_home_getexpired_time_api');
    });
});


 // users
 Route::prefix('admin')->group(function () {
    Route::post('login', [admin_backend_accounts_controller::class, 'admin_login_controller']) -> name('admin_login_api');

    Route::post('add_links', [admin_backend_settings_controller::class, 'admin_add_links_controller']) -> name('admin_add_links_api');
    // users
    Route::prefix('users')->group(function () {
        Route::post('search', [admin_backend_users_controller::class, 'admin_users_search_controller']) -> name('admin_users_search_api');
        Route::post('add', [admin_backend_users_controller::class, 'admin_users_add_controller']) -> name('admin_users_add_api');
        Route::post('update/{id}', [admin_backend_users_controller::class, 'admin_users_update_controller']) -> name('admin_users_update_api');
        Route::get('ban/{id}', [admin_backend_users_controller::class, 'admin_users_ban_controller']) -> name('admin_users_ban_api');
        Route::get('unban/{id}', [admin_backend_users_controller::class, 'admin_users_unban_controller']) -> name('admin_users_unban_api');
    });

    // settings
    Route::prefix('settings')->group(function () {
        Route::get('content18/{id}', [admin_backend_settings_controller::class, 'admin_settings_content18_controller']) -> name('admin_settings_content18_api');
        Route::post('products_add', [admin_backend_settings_controller::class, 'admin_settings_products_add_controller']) -> name('admin_settings_products_add_api');
        Route::get('products_delete/{id}', [admin_backend_settings_controller::class, 'admin_settings_products_delete_controller']) -> name('admin_settings_products_delete_api');
    });

});
