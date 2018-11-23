<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\admin\RolePermission;

class Role extends Model
{
    protected $fillable =[
        'title'
    ];


    public function Permissions(){
        return $this->belongsToMany('App\Models\admin\Permission','role_permission','role_id','permission_id');
    }

}
