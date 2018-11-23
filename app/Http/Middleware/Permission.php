<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Auth;
class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
        $route = app('request')->route();
        if ($route) {
            $action = app('request')->route()->getAction();
            $controller = '@';
            if (isset($action['controller'])) {
                $controller = class_basename($action['controller']);
            }
            list($routeControllerName, $routeActionName) = explode('@', $controller);

            if(empty(session('permissions'))){
                $permission = DB::table('permission')->select('ControllerName','ActionName')->get()->toArray();
                session(['permissions' => $permission]);
            }else{
                $permission = $request->session()->get('permissions');
                $value = false;
                $routeControllerName = str_replace('Controller','',$routeControllerName);
                foreach ($permission as $val){
                    if($val->ControllerName == $routeControllerName && $val->ActionName == $routeActionName){
                        $value = true;
                    }
                }

                if($value){
                    $isPermission = DB::table('role_permission')
                        ->leftJoin('admin_role','role_permission.role_id','admin_role.role_id')
                        ->leftJoin('permission','role_permission.permission_id','permission.id')
                        ->where(['admin_role.admin_id'=>Auth()->guard('admin')->id(),'permission.ControllerName'=>$routeControllerName,'permission.ActionName'=>$routeActionName])
                        ->get();

//                    if($isPermission->isEmpty()){
//                        return response()->json([
//                            'status' => true,
//                            'msg' => '',
//                            'tips' => '您没有该操作权限',
//                            'error_code' => '',
//                            'data' => '',
//                            'list' => ''
//                        ], 200, array(), JSON_UNESCAPED_UNICODE);
//                    }
                }


            }





            return $next($request);
        }
    }
}
