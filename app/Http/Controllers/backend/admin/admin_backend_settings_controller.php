<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\management;
use App\Models\products;
use Illuminate\Support\Facades\File;

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

    // admin_settings_content18_controller
    public function admin_settings_content18_controller($id)
    {
        $products = products::where('id', $id) -> first();

        products::where('id', $id) -> update([
            "content18" => $products['content18'] == "no" ? "yes" : "no"
        ]);
        return back() -> with('msg', 'Success updated!');
    }

    // admin_settings_products_add_controller
    public function admin_settings_products_add_controller(Request $req)
    {
        $pic = $req -> file('pic');
        $pic_name = time().".".$pic -> getClientOriginalExtension();
        $pic -> move(public_path("images/products"), $pic_name);


        $data = $req -> all();
        $db = new products;
        $db -> name = $data['name'];
        $db -> pic = $pic_name;
        $db -> content18 = !empty($data['content18']) ? $data['content18'] : "no";
        $db -> save();

        return back() -> with('msg', 'Success added!');
    }

    // admin_settings_products_delete_controller
    public function admin_settings_products_delete_controller($id)
    {
        $productsData = products::where('id', $id) -> first();
        File::delete(public_path("images/products/".$productsData['pic']));
        products::where('id', $id) -> delete();
        return back() -> with('msg', 'Success deleted!');
    }
}
