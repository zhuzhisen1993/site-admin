<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\Role;
use DB;
use App\Models\admin\RolePermission;

class RoleController extends Controller
{
    public function index(Request $request){
//            $role = Role::query();
//                if($request->input('search','')){
//                    $title = $request->input('search','');
//                    $role->where(function($query) use ($title){
//                        $query->where('title',$title);
//                    });
//                }
//            $roles= $role->paginate();
//            return view('admin.role.index',compact('roles'));
            return view('admin.role.index');
    }

    public function getData(){
        $data['permission'] = Permission::all();

        $roles = Role::with('Permissions')->get();
        $roles->each(function($item){
            $item->permission_ids = $item->permissions->pluck('id');
        });
        $data['roles'] = $roles;
        return json_encode($data);
    }

    public function operation(Request $request){
        $data = $request->input('data');
        if($data['id']){
            //修改操作
            $role = Role::where('id',$data['id'])->first();
            DB::transaction(function () use ($request,$data,$role){
                $permissions = $request->input('permission');
                if($permissions) {
                    RolePermission::where('role_id',$data['id'])->delete();
                    foreach ($permissions as $key=>$val){
                        $arr[$key]['role_id'] = $data['id'];
                        $arr[$key]['permission_id'] = $val;
                    }
                    RolePermission::insert($arr);
                }
                $role->title = $data['title'];
                $role->save();
            });
            return $this->response($role,'success','修改成功');
        }else{
            //添加操作
            $result = Role::create(
                [
                    'title' => $data['title']
                ])->toArray();
            return $this->response($result,'success','添加成功');
        }
    }

    public function destroy(Role $role){
        $role->delete();
        return json_encode('success');
    }


}
