<?php

namespace App\Http\Controllers\backend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\users;

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

}
