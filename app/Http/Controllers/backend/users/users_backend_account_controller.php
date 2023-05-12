<?php

namespace App\Http\Controllers\backend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\users;

class users_backend_account_controller extends Controller
{
    //users_users_login_controller
    public function users_users_login_controller(Request $req)
    {
        $data = $req -> all();

        // expired
        if(users::where('username', $data['username']) -> where('expired', '<', time()) -> exists()){
            return response() -> json(['st' => false, 'msg' => 'Your id is expired. Please contact us']);
        }

        // is ban
        if(users::where('username', $data['username']) -> where('st', 'ban') -> exists()){
            return response() -> json(['st' => false, 'msg' => 'Your id is ban. Please contact us']);
        }

        // browser_cache
        if($data['browser_cache'] == 1){
            if(users::where('username', $data['username']) -> exists()){
                $req -> session() -> put('username', $data['username']);
                return response() -> json(['st' => true]);
            }
        }

        // username
        if(users::where('username', $data['username']) -> exists()){
            // login_time
            if(users::where('username', $data['username']) -> where('login_time', '>', 0) -> exists()){
                $userData = users::where('username', $data['username']) -> first();
                users::where('username', $data['username']) -> update([
                    'login_time' => $userData['login_time'] - 1,
                ]);
                $req -> session() -> put('username', $data['username']);
                return response() -> json(['st' => true]);
            }else{
                return response() -> json(['st' => false, 'msg' => 'You are alreday login. Please contact us']);

            }
        }
        return response() -> json(['st' => false, 'msg' => 'Invalid Credentials']);
    }

    // users_users_logout_controller
    public function users_users_logout_controller(Request $req)
    {
        $req -> session() -> forget('username');
        return back();
    }
}
