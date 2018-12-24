<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\admin\Article;

class ArticleTpye extends Model
{
    protected $fillable = [
        'title','webtitle','webkeywords','webdescription'
    ];
    protected $table = 'article_types';

    public function article(){
        $this->hasMany(Article::class,'article_type_id');
    }
}
