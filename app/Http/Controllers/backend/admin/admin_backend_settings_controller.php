<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\management;

class admin_backend_settings_controller extends Controller
{
    //admin_add_links_controller
    public function admin_add_links_controller(Request $req)
    {
        $data = $req -> all();
        management::where('id', 1) -> update([
            "links" => $data['links']
        ]);
        return back() -> with('msg', 'SUccessfully updated!');
    }
}
