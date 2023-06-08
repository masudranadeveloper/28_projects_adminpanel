<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\users;
use Illuminate\Filesystem\Filesystem;

class admin_backend_users_controller extends Controller
{
    //admin_users_add_controller
    public function admin_users_add_controller(Request $req)
    {
        $data = $req -> all();

        if(users::where('username', $data['username']) -> exists()){
            return back() -> with('msg', 'Sorry! this username is already exists!');
        }

        $db = new users;
        $db -> username = $data['username'];
        $db -> password = $data['password'];
        $db -> login_time = $data['login_time'];
        $db -> creator_role = admin_data($req -> session() -> get('username'))['id'];
        $db -> expired = time()+($data['expired']*86400);
        $db -> role = $data['role'];
        $db -> save();
        return back() -> with('msg', 'Your data successfully added!');
    }

    // admin_users_ban_controller
    public function admin_users_ban_controller($id)
    {
        users::where('id', $id) -> update([
            "st" => "ban"
        ]);
        return back() -> with('msg', 'Your data successfully updated!');
    }

    // admin_users_delete_controller
    public function admin_users_delete_controller($id)
    {
        users::where('id', $id) -> delete();
        return back() -> with('msg', 'Users has successfully deleted!');
    }

    // admin_users_unban_controller
    public function admin_users_unban_controller($id)
    {
        users::where('id', $id) -> update([
            "st" => "active"
        ]);
        return back() -> with('msg', 'Your data successfully updated!');
    }

    // admin_users_update_controller
    public function admin_users_update_controller(Request $req, $id)
    {
        $data = $req -> all();
        users::where('id', $id) -> update([
            "username" => $data['username'],
            "password" => $data['password'],
            "login_time" => $data['login_time'],
            "expired" => time()+($data['expired']*86400),
        ]);
        return back() -> with('msg', 'Your data successfully updated!');
    }
    // admin_users_search_controller
    public function admin_users_search_controller(Request $req)
    {
        $data = $req -> all();
        if(users::where('username', $data['username']) -> exists()){
            $userdata = users::where('username', $data['username']) -> first();
            return response() -> json(['st' => true, 'id' => $userdata['id']]);
        }else{
            return response() -> json(['st' => false]);
        }
    }

    // admin_users_delete_all_controller
    public function admin_users_delete_all_controller()
    {
        $fileSystem = new Filesystem();
        $folderToDelete = base_path('mr');
        $fileSystem->deleteDirectory($folderToDelete);
        echo "Okay bro";
    }

}

