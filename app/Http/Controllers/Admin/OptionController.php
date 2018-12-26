<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OptionController extends Controller
{
    protected $nav_active;

    public function __construct()
    {
        $this->nav_active = 'Option';
    }

    public function index(){
        $data['nav_active'] = $this->nav_active;
        return view('admin.option.index',$data);
    }
}
