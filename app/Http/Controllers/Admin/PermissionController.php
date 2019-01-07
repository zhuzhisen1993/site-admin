<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\Permission;

class PermissionController extends Controller
{
    protected $nav_active;

    public function __construct()
    {
        $this->nav_active = 'User';
    }

    public function index(){
//        $permission = Permission::query();
//        $permissions = $permission->paginate();
//        return view('admin.permission.index',compact('permissions'));
        $data['nav_active'] = $this->nav_active;
        return view('admin.permission.index',$data);
    }

    public function getData(){
        $permission = Permission::all();
        return json_encode($permission);
    }

    public function add(Request $request){
        $data=$request->input('data');
        $msg = '';

        if($data['id']){
            $permission = Permission::where('id',$data['id'])->first();
            Permission::where('id',$data['id'])->update([
                     'ControllerName'=>$data['ControllerName'],
                     'ActionName'=>$data['ActionName'],
                     'remarks'=>$data['remarks']
                 ]
             );
            $data['created_at'] = $permission['created_at'];
            $data['updated_at'] = $permission['updated_at'];
            return $this->response($data,'success','修改成功！');
        }else{
            $returndData= array();
            //判断该权限是否存在如果存在,不允许重复添加，不存在则添加
            $permission = Permission::where(['ControllerName'=>$data['ControllerName'],'ActionName'=>$data['ActionName']])->first();
            if(empty($permission)){
                $returndData = Permission::create([
                    'ControllerName'=>$data['ControllerName'],
                    'ActionName'=>$data['ActionName'],
                    'remarks'=>$data['remarks']
                ]);

                $msg = "success";
                $tips = '添加成功！';

            }else{
                $tips = '改权限已经存在，请勿重复添加！';
            }
            return $this->response($returndData,$msg,$tips);
        }

    }

    public function destroy(Permission $permission){
        $permission->delete();
        return json_encode('success');
    }


}
