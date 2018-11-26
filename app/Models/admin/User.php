<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\admin\Role;

class User extends Model
{
     protected $fillable = [
         'name','password'
     ];

     protected $table = 'admins';

     public function roles(){
         return $this->belongsToMany('App\Models\admin\Role','admin_role','admin_id');
     }

}
