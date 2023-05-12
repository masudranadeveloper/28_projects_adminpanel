<?php

namespace App\Http\Controllers\frontend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\management;


class admin_frontend_setting_Controller extends Controller
{
    //admin_settings_controller
    public function admin_settings_controller()
    {
        $data = management::where('id', 1) -> first();
        return view('admin.pages.settings.settings') -> with(compact('data'));
    }
}
