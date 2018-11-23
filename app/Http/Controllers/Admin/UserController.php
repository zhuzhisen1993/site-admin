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
        $msg = '';

        if($data['id']){

        }else{
            $returndData= array();
            //添加操作
            DB::transaction(function () use ($request,$data){
                $roles = $request->input('roles');
                if($roles){
                    $user = User::insert([
                           'name' => $request->input('username'),
                          'password' => bcrypt($request->input('password'))
                    ]);
                    foreach ($roles as $val){
                        DB::table('admin_role')->insert([
                            'admin_id'=>$user->id,
                            'role_id'=>$val
                        ]);
                    }
                }
            });
        }

    }




    public function store(Request $request,User $user){
        if(empty($request->input('username'))){
            return redirect()->route('admin.users.create')->with('status','用户名不能为空！');
        }
        if(empty($user->password = $request->input('password'))|| strlen($user->password = $request->input('password'))<6 ){
            return redirect()->route('admin.users.create')->with('status','密码不能为空且长度不能小于6');
        }else{
            if($user->password = $request->input('password') != $user->password = $request->input('confirm_password')){
                return redirect()->route('admin.users.create')->with('status','两次密码不一致请重新输入');
            }else{
                DB::transaction(function () use ($user,$request){
                    $roles = $request->input('roles');
                    if($roles){
                        $user->name = $request->input('username');
                        $user->password = bcrypt($request->input('password'));
                        $user->save();
                        foreach ($roles as $val){
                           DB::table('admin_role')->insert([
                               'admin_id'=>$user->id,
                               'role_id'=>$val
                           ]);
                        }
                    }
                });
                return redirect()->route('admin.users.index');
            }
        }
    }

    public function update(User $user,Request $request){
        $roles = $request->input('roles');
        if($request->input('roles')){
            DB::transaction(function () use ($user,$roles){
                AdminRole::where('admin_id',$user->id)->delete();
                foreach ($roles as $key=>$val){
                    $arr[$key]['admin_id'] = $user->id;
                    $arr[$key]['role_id'] = $val;
                }
                AdminRole::insert($arr);
            });
            return redirect()->route('admin.users.index');
        }else{
            return redirect()->route('admin.users.create')->with('status','角色不允许为空，请选择对应的角色!');
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
