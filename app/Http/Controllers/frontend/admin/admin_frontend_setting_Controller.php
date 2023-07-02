<?php

namespace App\Http\Controllers\frontend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\products;
use App\Models\management;
use App\Models\slider;
use App\Models\live_tv;

class admin_frontend_setting_Controller extends Controller
{
    //admin_settings_products_controller
    public function admin_settings_products_controller()
    {
        $products = products::orderBy('id', 'DESC') -> paginate(10);
        return view('admin.pages.settings.products.products') -> with(compact('products'));
    }

    // admin_settings_products_add_controller
    public function admin_settings_products_add_controller()
    {
        return view('admin.pages.settings.products.add');
    }

    // admin_settings_products_update_controller
    public function admin_settings_products_update_controller($id)
    {
        $data = products::where('id', $id) -> first();
        return view('admin.pages.settings.products.update') -> with(compact('id', 'data'));
    }

    // admin_settings_contact_controller
    public function admin_settings_contact_controller(Request $req)
    {
        $data = management::where('id', 1) -> first();
        return view('admin.pages.settings.contact') -> with(compact('data'));
    }

    // admin_settings_slider_controller
    public function admin_settings_slider_controller()
    {
        $slider = slider::orderBy('id', 'DESC') -> paginate(10);
        return view('admin.pages.settings.slider.slider') -> with(compact('slider'));
    }

    // admin_settings_slider_add_controller
    public function admin_settings_slider_add_controller()
    {
        return view('admin.pages.settings.slider.up_new');
    }
    /*
    ========================
          LIVE TV
    ========================
    */
    // admin_settings_live_tv_controller
    public function admin_settings_live_tv_controller()
    {
        $products = live_tv::orderBy('id', 'DESC') -> paginate(10);
        return view('admin.pages.settings.live_tv.live_tv') -> with(compact('products'));
    }

    // admin_settings_live_tv_add_controller
    public function admin_settings_live_tv_add_controller()
    {
        return view('admin.pages.settings.live_tv.add');
    }

    // admin_settings_live_tv_update_controller
    public function admin_settings_live_tv_update_controller($id)
    {
        $data = live_tv::where('id', $id) -> first();
        return view('admin.pages.settings.live_tv.update') -> with(compact('data'));
    }

}
