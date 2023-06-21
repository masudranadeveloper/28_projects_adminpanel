<?php

namespace App\Http\Controllers\frontend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\products;
use App\Models\slider;
use App\Models\users;
use App\Models\live_tv;

class users_frontend_deshbord_controller extends Controller
{
    //users_home_controller
    public function users_home_controller(Request $request)
    {
        $userData = users::where('username', $request -> session() -> get('username')) -> first();
        if($request -> session() -> has('content18')){
            if($userData['user_adult'] == "yes"){
                $products = products::orderBy('id', 'DESC') -> get();
            }else{
                $products = products::orderBy('id', 'DESC') -> where("content18", "no") -> get();
            }
        }else{
            if($userData['user_adult'] == "yes"){
                $products = products::orderBy('id', 'DESC') -> where('content18', 'no') -> get();
            }else{
                $products = products::orderBy('id', 'DESC') -> where("content18", "no") -> where('content18', 'no') -> get();
            }
        }
        $slider = slider::orderBy('id', 'DESC') -> get();

        return view('users.pages.home.home') -> with(compact('products', 'slider', 'userData'));
    }

    // users_livetv_controller
    public function users_livetv_controller(Request $request)
    {
        $userData = users::where('username', $request -> session() -> get('username')) -> first();
        if($request -> session() -> has('content18')){
            if($userData['user_adult'] == "yes"){
                $products = live_tv::orderBy('id', 'DESC') -> where("expired1", '>', time()) -> orWhere("expired2", '>', time()) -> orWhere("expired3", '>', time()) -> orWhere("expired4", '>', time()) -> get();
            }else{
                $products = live_tv::orderBy('id', 'DESC') -> where("content18", "no") -> where("expired1", '>', time()) -> orWhere("expired2", '>', time()) -> orWhere("expired3", '>', time()) -> orWhere("expired4", '>', time()) -> get();
            }
        }else{
            if($userData['user_adult'] == "yes"){
                $products = live_tv::orderBy('id', 'DESC') -> where("expired1", '>', time()) -> orWhere("expired2", '>', time()) -> orWhere("expired3", '>', time()) -> orWhere("expired4", '>', time()) -> where('content18', 'no') -> get();
            }else{
                $products = live_tv::orderBy('id', 'DESC') -> where("content18", 'no') -> where("expired1", '>', time()) -> orWhere("expired2", '>', time()) -> orWhere("expired3", '>', time()) -> orWhere("expired4", '>', time()) -> where('content18', 'no') -> get();
            }
        }
        $slider = slider::orderBy('id', 'DESC') -> get();

        return view('users.pages.home.home') -> with(compact('products', 'slider', 'userData'));
    }

    // users_404_controller
    public function users_404_controller(Request $request)
    {
        return view('users.pages.home.404');
    }

}
