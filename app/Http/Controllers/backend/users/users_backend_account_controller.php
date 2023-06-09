<?php

namespace App\Http\Controllers\backend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\users;
use App\Models\loging_log;

class users_backend_account_controller extends Controller
{
    //users_users_login_controller
    public function users_users_login_controller(Request $req)
    {
        $data = $req -> all();

        // username check
        if(!users::where('username', $data['username']) -> exists()){
            return response() -> json(['st' => false, 'msg' => 'Invalid Credentials']);
        }

        // user data
        $userData = users::where('username', $data['username']) -> first();

        // expired
        if(users::where('username', $data['username']) -> where('expired', '<', time()) -> exists()){
            return response() -> json(['st' => false, 'msg' => 'Your id is expired.']);
        }

        // is ban
        if(users::where('username', $data['username']) -> where('st', 'ban') -> exists()){
            return response() -> json(['st' => false, 'msg' => 'Your id is ban.']);
        }

        // browser_cache
        if($_SERVER['HTTP_USER_AGENT'] == $userData['uniqeID']){
            if(users::where('username', $data['username']) -> exists()){
                // login history 
                $db = new loging_log;
                $db -> username = $data['username'];
                $db -> city = $data['city'];
                $db -> ip = $data['ip'];
                $db -> loc = $data['loc'];
                $db -> browser_id = $_SERVER['HTTP_USER_AGENT'];
                $db -> save();

                $req -> session() -> put('username', $data['username']);
                return response() -> json(['st' => true]);
            }
        }

        // login_time & new device
        if(users::where('username', $data['username']) -> where('login_time', '>', 0) -> exists()){
            users::where('username', $data['username']) -> update([
                'login_time' => $userData['login_time'] - 1,
                "uniqeID" => $_SERVER['HTTP_USER_AGENT'],
            ]);
            // login history 
            $db = new loging_log;
            $db -> username = $data['username'];
            $db -> city = $data['city'];
            $db -> ip = $data['ip'];
            $db -> loc = $data['loc'];
            $db -> browser_id = $_SERVER['HTTP_USER_AGENT'];
            $db -> save();
            
            $req -> session() -> put('username', $data['username']);
            return response() -> json(['st' => true]);
        }else{
            return response() -> json(['st' => false, 'msg' => 'You are alreday login.']);

        }
    }

    // users_users_logout_controller
    public function users_users_logout_controller(Request $req)
    {
        $req -> session() -> forget('username');
        return back();
    }
}
