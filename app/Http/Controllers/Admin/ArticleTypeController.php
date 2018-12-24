<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\ArticleTpye;

class ArticleTypeController extends Controller
{

    protected $nav_active;

    public function __construct()
    {
        $this->nav_active = 'Article';
    }

    public function index(){
        $data['nav_active'] = $this->nav_active;
        return view('admin.articles.type_list',$data);
    }

    public function getData(){
        return $this->response(ArticleTpye::all(),'success','数据获取成功！');
    }

    public function add(Request $request){
          $articleType = ArticleTpye::create([
               'title'=>$request->input('data.title'),
               'webtitle'=>$request->input('data.webtitle'),
               'webkeywords'=>$request->input('data.webkeywords'),
               'webdescription'=>$request->input('data.webdescription')
          ]);
          return $this->response($articleType,'success','添加成功！');
    }

    public function edit(Request $request,ArticleTpye $articleTpye){
        $articleTpyes = ArticleTpye::where('id',$articleTpye->id)->first();
        $articleTpyes->title = $request->input('data.title');
        $articleTpyes->webtitle = $request->input('data.webtitle');
        $articleTpyes->webkeywords = $request->input('data.webkeywords');
        $articleTpyes->webdescription = $request->input('data.webdescription');
        $articleTpyes->save();
        return $this->response($articleTpyes,'success','修改成功！');
    }

    public function destroy(ArticleTpye $articleTpye){
        $articleTpye->delete();
        return $this->response([],'success','删除成功！');
    }

}
