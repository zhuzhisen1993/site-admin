<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
         'option_catalog_id','title'
    ];
}
