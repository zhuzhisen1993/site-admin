<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
      'name','photo','catalog_id','model','sku','describe','content','isshow','num','sort'
    ];

}
