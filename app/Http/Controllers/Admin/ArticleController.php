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
        $data['article'] = Article::with('articleType')->get();
        $data['articleType'] = ArticleTpye::all();

        return $this->response($data,'success','数据请求成功！');
    }

    public function add(Request $request){
        $data = $request->input('data');
        $result = array();
        if($request->all()){
            $article = Article::where(['article_type_id'=>$data['article_type_id'],'title'=>$data['title']])->first();
            if(!$article){
                $result = Article::insert($data);
                $tips = '内容添加成功！';
            }else{
                $tips = '该数据已经存在请勿重复操作！';
            }
        }else{
            $tips = '提交的数据不能为空，请先填充数据！';
        }
        return $this->response($result,'success',$tips);
    }


    public function destroy()
    {

    }
}
