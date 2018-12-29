<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\admin\OptionType;

class OptionCatalog extends Model
{
    protected $fillable=[
        'title','option_type_id'
    ];
    protected $table = 'option_catalogs';

    public function optionType(){
        return $this->belongsTo(OptionType::class,'option_type_id','id');
    }
}
