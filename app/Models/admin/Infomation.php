<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Infomation extends Model
{
    protected $table = 'infomations';
    protected $fillable=[
        'name','photo','content','phone','email','address'
    ];

}
