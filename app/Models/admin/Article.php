<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\admin\ArticleTpye;

class Article extends Model
{
    protected $fillable = [
        'article_type_id','title','img_url','description','content','frequency','webtitle','webkeywords','webdescription'
    ];
    public function articletypes(){
        return $this->belongsTo(ArticleTpye::class,'article_type_id','id');
    }
}
