<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\admin\Permission;

class RolePermission extends Model
{
    protected $fillable = [
        'permission_id',
        'role_id'
    ];

    protected $table = 'role_permission';

}
