<?php

namespace App\Http\Controllers\frontend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class users_frontend_accounts_controller extends Controller
{
    //users_accounts_controller
    public function users_accounts_controller()
    {
        return view('users.pages.accounts.login');
    }
}
