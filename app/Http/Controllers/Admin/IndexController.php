<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * 显示后台模版首页
     */
    protected $nav_active;

    public function __construct(){
        $this->nav_active = '';
    }

    public function index(){
        $data['nav_active'] = $this->nav_active;
        return view('admin.login.index',$data);
    }
}
