<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\User;
use Illuminate\Support\Facades\Auth;

class UserInfoController extends Controller
{

    protected $nav_active;

    public function __construct()
    {
        $this->nav_active = 'User';
    }

    public function index(){
        $data['nav_active'] = $this->nav_active;
        return view('admin.users.info',$data);
    }

    public function getData(){
        return Auth::guard('admin')->user();
    }

    public function edit(Request $request,User $user){
        if($user->id != Auth::guest('admin')->id){
            return $this->response([],'warning','你没有改权限');
        }else{
            $user->update($request->all());
            $this->response(array(),'success','修改成功');
        }
    }

}
