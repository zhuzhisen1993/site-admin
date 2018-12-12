<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\User;

class UserInfoController extends Controller
{
    public function index(){
        return view('admin.users.info');
    }


    public function getData(User $user){
        return $user;
    }

    public function update(Request $request,User $user){

        $user->update([
            'name' =>$request->input('data.name'),
            'img_url' =>$request->input('data.img_url'),
            'introduce'=>$request->input('data.introduce')
        ]);

        $this->response(array(),'success','修改成功');
    }

}
