<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class OptionType extends Model
{
    protected $fillable = [
        'type'
    ];
    protected $table ='option_types';
}
