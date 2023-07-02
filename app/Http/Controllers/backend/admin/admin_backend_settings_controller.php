<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\management;
use App\Models\products;
use Illuminate\Support\Facades\File;
use App\Models\slider;
use App\Models\users;
use App\Models\live_tv;

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
        $db -> links = $data['links'];
        $db -> content18 = !empty($data['content18']) ? $data['content18'] : "no";
        $db -> save();

        return back() -> with('msg', 'Success added!');
    }

    // admin_settings_products_update_img_controller
    public function admin_settings_products_update_img_controller(Request $req, $id)
    {
        $pic = $req -> file('pic');
        $pic_name = time().".".$pic -> getClientOriginalExtension();
        $pic -> move(public_path("images/products"), $pic_name);

        $productsData = products::where('id', $id) -> first();
        File::delete(public_path("images/products/".$productsData['pic']));

        products::where('id', $id) -> update([
            "pic" => $pic_name
        ]);
        return back() -> with('msg', 'Products img successfully updated!');
    }

    // admin_settings_products_update_content_controller
    public function admin_settings_products_update_content_controller(Request $req, $id)
    {
        $data = $req -> all();
        products::where('id', $id) -> update([
            "name" => $data['name'],
            "links" => $data['links'],
            "content18" => !empty($data['content18']) ? $data['content18'] : "no"
        ]);
        return back() -> with('msg', 'Products content successfully updated!');
    }

    // admin_settings_products_delete_controller
    public function admin_settings_products_delete_controller($id)
    {
        $productsData = products::where('id', $id) -> first();
        File::delete(public_path("images/products/".$productsData['pic']));
        products::where('id', $id) -> delete();
        return back() -> with('msg', 'Success deleted!');
    }

    // admin_settings_add_slider_controller
    public function admin_settings_add_slider_controller(Request $req)
    {
        $pic = $req -> file('img');
        $pic_name = time().".".$pic -> getClientOriginalExtension();
        $pic -> move(public_path("images/slider"), $pic_name);


        $data = $req -> all();
        $db = new slider;
        $db -> img = $pic_name;
        $db -> links = $data['links'];
        $db -> save();

        return back() -> with('msg', 'You are successfully add a new slider!');
    }

    // admin_settings_delete_slider_controller
    public function admin_settings_delete_slider_controller($id)
    {
        $productsData = slider::where('id', $id) -> first();
        File::delete(public_path("images/slider/".$productsData['pic']));
        slider::where('id', $id) -> delete();
        return back() -> with('msg', 'You are successfully delete a slider!');
    }

    // admin_settings_contact_links_add_controller
    public function admin_settings_contact_links_add_controller(Request $req)
    {
        $data = $req -> all();
        management::where('id', 1) -> update([
            "links" => $data['links']
        ]);
        return back() -> with('msg', 'You are successfully update your contact links!');

    }

    // admin_reseller_ban_controller
    public function admin_reseller_ban_controller($id)
    {
        users::where('creator_role', $id) -> update([
            "st" => "ban"
        ]);
        users::where('id', $id) -> update([
            "st" => "ban"
        ]);
        return back() -> with('msg', 'A reseller has ban with his users!');
    }

    // admin_reseller_delete_controller
    public function admin_reseller_delete_controller($id)
    {
        users::where('creator_role', $id) -> delete();
        users::where('id', $id) -> delete();
        return back() -> with('msg', 'A reseller has delete with his users!');
    }

    // admin_live_tv_add_controller
    public function admin_live_tv_add_controller(Request $req)
    {
        $pic = $req -> file('pic');
        $pic_name = time().".".$pic -> getClientOriginalExtension();
        $pic -> move(public_path("images/products"), $pic_name);


        $data = $req -> all();
        $db = new live_tv;
        $db -> name = $data['name'];
        $db -> pic = $pic_name;
        // links && expired 
        $db -> links1 = $data['links1'];
        $db -> links2 = $data['links2'];
        $db -> links3 = $data['links3'];
        $db -> links4 = $data['links4'];

        $db -> expired1 = "00";//time()+($data['expired1']*60*60);
        $db -> expired2 = "00";//time()+($data['expired2']*60*60);
        $db -> expired3 = "00";//time()+($data['expired3']*60*60);
        $db -> expired4 = "00";//time()+($data['expired4']*60*60);

        $db -> content18 = !empty($data['content18']) ? $data['content18'] : "no";
        $db -> save();

        return back() -> with('msg', 'A movie links successfully added!');
    }

    // admin_settings_livetv_content18_controller
    public function admin_settings_livetv_content18_controller($id)
    {
        $live_tv = live_tv::where('id', $id) -> first();
        live_tv::where('id', $id) -> update([
            "content18" => $live_tv['content18'] == "no" ? "yes" : "no"
        ]);
        return back() -> with('msg', '18+ content status successfully updated!');
    }
    // admin_settings_livetv_delete_controller
    public function admin_settings_livetv_delete_controller($id)
    {
        $live_tv = live_tv::where('id', $id) -> first();
        File::delete(public_path("images/products/".$live_tv['pic']));
        live_tv::where('id', $id) -> delete();
        return back() -> with('msg', 'Success deleted!');
    }

    // admin_settings_livetv_update_controller
    public function admin_settings_livetv_update_controller(Request $req, $id)
    {
        $data = $req -> all();
        live_tv::where('id', $id) -> update([
            "name" => $data['name'],
            "content18" => !empty($data['content18']) ? $data['content18'] : "no",
            "links1" => $data['links1'],
            "links2" => $data['links2'],
            "links3" => $data['links3'],
            "links4" => $data['links4'],
            "expired1" => "00",//time()+($data['expired1']*60*60),
            "expired2" => "00",//time()+($data['expired2']*60*60),
            "expired3" => "00",//time()+($data['expired3']*60*60),
            "expired4" => "00",//time()+($data['expired4']*60*60),

        ]);
        return back() -> with('msg', 'Live tv content successfully updated!');
    }
}
