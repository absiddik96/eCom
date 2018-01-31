<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminBaseController;

class AdminUsersController extends AdminBaseController
{
    public function login()
    {
        return view('admin.auth.login');
    }
}
