<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\AdminRole;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\User;
use App\Models\admin\Role;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
//        $user = User::query()->with('roles');
//        $users = $user->paginate();
//        return view('admin.users.index',compact('users'));
        return view('admin.users.index');
    }

    public function getData(){
        $data['roles'] = Role::all();
        $user = User::with('roles')->get();
        $user->each(function($item){
            $item->roles_ids = $item->roles->pluck('id');
        });
        $data['users'] = $user;

        return json_encode($data);
    }

    public function add(Request $request){

        $data=$request->input('data');
        $roles = $request->input('roles');

        if($data['id']){
            //修改操作
            if($roles){
                DB::transaction(function () use($data,$roles){
                    \App\Models\admin\AdminRole::where('admin_id',$data['id'])->delete();
                    foreach ($roles as $key =>$val){
                        $arr[$key]['admin_id'] = $data['id'];
                        $arr[$key]['role_id'] = $val;
                    }
                    \App\Models\admin\AdminRole::insert($arr);

                    return $this->response($roles,'success','修改成功！');
                });
            }

        }else{

            //添加操作
            DB::transaction(function () use ($data,$roles){
                if($roles){
                    $users = \App\Models\admin\User::create([
                        'name'=>$data['username'],
                        'password'=>bcrypt($data['password'])
                    ]);

                    foreach ($roles as $key =>$val){
                            $arr[$key]['admin_id'] = $users->id;
                            $arr[$key]['role_id'] = $val;
                    }

                    \App\Models\admin\AdminRole::insert($arr);

                }
                return $this->response($users,'success','添加成功');
            });
        }

    }


    public function resetPassword(Request $request){
        $userId = $request->input('data.id');
        $password = $request->input('data.password');

        $msg = '';
        $this->response();
        if(empty($password) || empty($userId)){
            $msg ='ERROR:用户ID丢失，或者密码为空！';
        }else{
            User::where('id',$userId)->update(['password'=>bcrypt($password)]);
            $msg = "success";
        }
        return json_encode($msg);

    }


}
