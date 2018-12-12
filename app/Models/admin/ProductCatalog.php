<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class ProductCatalog extends Model
{
    protected $fillable = [
        'name','pid','level','isshow'
    ];

    protected $table ='product_catalogs';

}
