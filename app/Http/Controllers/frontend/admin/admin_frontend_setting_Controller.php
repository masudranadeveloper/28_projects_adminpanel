<?php

namespace App\Http\Controllers\frontend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\products;


class admin_frontend_setting_Controller extends Controller
{
    //admin_settings_products_controller
    public function admin_settings_products_controller()
    {
        $products = products::orderBy('id', 'DESC') -> paginate(10);
        return view('admin.pages.settings.products.settings') -> with(compact('products'));
    }

    // admin_settings_products_add_controller
    public function admin_settings_products_add_controller()
    {
        return view('admin.pages.settings.products.add');
    }
}
