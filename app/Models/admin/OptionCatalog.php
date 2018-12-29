<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class OptionCatalog extends Model
{
    protected $fillable=[
        'title','option_type_id'
    ];
    protected $table = 'option_catalogs';
}
