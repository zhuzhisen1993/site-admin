<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    protected $fillable = [
        'admin_id',
        'role_id'
    ];

    protected $table = 'admin_role';
}
