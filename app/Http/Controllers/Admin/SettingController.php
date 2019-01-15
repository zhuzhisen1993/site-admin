<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    protected $nav_active;

    public function __construct()
    {
        $this->nav_active = 'Site';
    }

    public function index(){
        $data['nav_active'] = $this->nav_active;
        return view('admin.site.setting',$data);
    }
}
