<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\ArticleTpye;

class ArticleTypeController extends Controller
{
    public function index(){
        return view('admin.articles.type_list');
    }

    public function getData(){
        return $this->response(ArticleTpye::all(),'success','数据获取成功！');
    }

    public function add(Request $request){
          $articleType = ArticleTpye::create([
               'title'=>$request->input('data.title')
          ]);
          return $this->response($articleType,'success','添加成功！');
    }

    public function edit(Request $request,ArticleTpye $articleTpye){
        $articleTpyes = ArticleTpye::where('id',$articleTpye->id)->first();
        $articleTpyes->title = $request->input('data.title');
        $articleTpyes->save();
        return $this->response($articleTpyes,'success','修改成功！');
    }

    public function destroy(ArticleTpye $articleTpye){
        $articleTpye->delete();
        return $this->response([],'success','删除成功！');
    }

}
