<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\admin\OptionCatalog;

class Option extends Model
{
    protected $fillable = [
         'option_catalog_id','title','sku'
    ];

    public function optionCatalog(){
        return $this->belongsTo(OptionCatalog::class,'option_catalog_id','id');
    }

}
