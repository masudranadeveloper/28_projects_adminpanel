<?php

namespace App\Http\Controllers\frontend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\products;
use App\Models\slider;
use App\Models\users;

class users_frontend_deshbord_controller extends Controller
{
    //users_home_controller
    public function users_home_controller(Request $request)
    {
        if($request -> session() -> has('content18')){
            $products = products::orderBy('id', 'DESC') -> get();
        }else{
            $products = products::orderBy('id', 'DESC') -> where('content18', 'no') -> get();
        }
        $slider = slider::orderBy('id', 'DESC') -> get();
        $userData = users::where('username', $request -> session() -> get('username')) -> first();

        return view('users.pages.home.home') -> with(compact('products', 'slider', 'userData'));
    }
}
