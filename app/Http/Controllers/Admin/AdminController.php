<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\AdminRepository;
class AdminController extends Controller
{
    /**
     * @var AdminRepository
     */
    public $admin;

    /**
     * AdminController constructor.
     * @param AdminRepository $admin
     */
    public function __construct(AdminRepository $admin)
    {
        $this->admin = $admin;
    }

    //管理员主页

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['collects'] = $this->admin->dashboard_init_data();
        $data['nav_active'] = '';
        return view('admin.dashboard.index',$data);
    }



    //管理员信息

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminInfo()
    {
        return view('admin.users.admin');
    }
}
