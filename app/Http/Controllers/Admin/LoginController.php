<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Extensions\AuthenticatesLogout;

class LoginController extends Controller
{
    use AuthenticatesUsers, AuthenticatesLogout {
         AuthenticatesLogout::logout insteadof AuthenticatesUsers;
    }

    protected $redirectTo = '/admin';

    public function __construct()
    {
         $this->middleware('guest.admin', ['except' => 'logout']);
         //调用中间件，logout过滤中间件的验证,不受中间件影响
    }

    /**
* 显示后台登录模板
*/
     public function showLoginForm()
     {
         return view('admin.login.login');
     }

     /**
      * 使用 admin guard
      */
     protected function guard()
     {
             return auth()->guard('admin');
     }

     /**
      * 重写验证时使用的用户名字段
      */
     public function username()
     {
             return 'name';
     }


}
