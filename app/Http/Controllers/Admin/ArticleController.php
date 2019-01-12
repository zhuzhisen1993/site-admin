<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\ArticleTpye;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\AdminRepository;
use App\Models\admin\Article;


class ArticleController extends Controller
{
    //文章列表页面
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    protected $nav_active;

    public function __construct()
    {
        $this->nav_active = 'Article';
    }

    public function index()
    {
        $data['nav_active'] = $this->nav_active;
        return view('admin.articles.index',$data);
    }

    public function getData(){

        $data['article'] = Article::with('articletypes')->get();

        $data['articleType'] = ArticleTpye::all();

        return $this->response($data,'success','数据请求成功！');
    }



    public function add(Request $request){
        $data = $request->input('data');
        $option = Article::create($data);
        return $this->response($option,'success','添加成功！');
    }


    public function edit(Article $article,Request $request){
        $data = $request->input('data');
        $articles = Article::where('id',$article->id)->update($data);

        return $this->response($articles,'success','修改成功！');
    }


    public function destroy()
    {

    }
}
