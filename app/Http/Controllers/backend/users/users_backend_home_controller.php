<?php

namespace App\Http\Controllers\backend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\users;
use App\Models\products;
use App\Models\live_tv;

class users_backend_home_controller extends Controller
{
    //users_home_content18_controller
    public function users_home_content18_controller(Request $req)
    {
        if($req -> session() -> has('content18')){
            $req -> session() -> forget('content18');
        }else{
            $req -> session() -> put('content18', true);
        }

        return back();
    }

    // users_home_getexpired_time_controller
    public function users_home_getexpired_time_controller(Request $req)
    {
        $userData = users::where('username', $req -> session() -> get('username')) -> first();
        return response() -> json(['time' => $userData['expired']]);
    }

    // users_home_search_controller
    public function users_home_search_controller(Request $req)
    {
        $data = $req -> all();
        if($data['where'] == "movie"){
            if($data['type'] == "no"){
                $products = products::orderBy('id', 'DESC') -> where('name', 'LIKE', "{$data['search']}%") -> where('content18', 'no') -> get();
            }else{
                $products = products::orderBy('id', 'DESC') -> where('name', 'LIKE', "{$data['search']}%") -> get();
            }
        }else{
            if($data['type'] == "no"){
                $products = live_tv::orderBy('id', 'DESC') -> where('name', 'LIKE', "{$data['search']}%") -> where('content18', 'no') -> get();
            }else{
                $products = live_tv::orderBy('id', 'DESC') -> where('name', 'LIKE', "{$data['search']}%") -> get();
            }
        }
        
        return response() -> json(['data' => $products]);
    }

}
