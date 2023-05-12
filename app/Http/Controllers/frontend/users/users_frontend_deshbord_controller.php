<?php

namespace App\Http\Controllers\frontend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\management;

class users_frontend_deshbord_controller extends Controller
{
    //users_home_controller
    public function users_home_controller()
    {
        $data = management::where('id', 1) -> first();
        return view('users.pages.home.home') -> with(compact('data'));
    }
}
