<?php

namespace App\Http\Controllers\Admin\Dash;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminBaseController;

class AdminDashController extends AdminBaseController
{
    public function dash()
    {
        return view('admin.dash.index');
    }
}
