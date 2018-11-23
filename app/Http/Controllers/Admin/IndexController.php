<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * 显示后台模版首页
     */
    public function index(){
        return view('admin.login.index');
    }
}
