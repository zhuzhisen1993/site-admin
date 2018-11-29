<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\admin\ArticleTpye;

class Article extends Model
{
    protected $fillable = [
        'title','img_url','description','content','frequency'
    ];
    public function articleType(){
        $this->belongsTo(ArticleTpye::class,'id','article_type_id');
    }
}
