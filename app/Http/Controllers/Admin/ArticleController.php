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

    public function addOptionCatalog(Request $request){
        $data = $request->input('data');
        $optionCatalog = OptionCatalog::create([
            'option_type_id'=>$data['option_type_id'],
            'title'=>$data['title']]);
            return $this->response($optionCatalog,'success','添加成功！');
    }


    public function add(Request $request){
        $data = $request->input('data');
        $option = Option::create([
            'option_catalog_id' =>$data['option_catalog_id'],
            'title' =>$data['title']
        ]);
        return $this->response($option,'success','添加成功！');
    }


    public function edit(Option $option,Request $request){
        $data = $request->input('data');
        $options = Option::where('id',$option->id)->update([
            'title' => $data['title']
        ]);

        return $this->response($options,'success','修改成功！');
    }

    public function destory(Option $option){
        Option::deleted();
        return $this->response([],'success','删除成功！');
    }

    public function editOptionCatalog(Request $request,OptionType $optionType){
        $data = $request->input('data');
        $optionTypes = OptionCatalog::where('id',$optionType->id)->update([
            'title' => $data['title']
        ]);
        return $this->response($optionTypes,'success','修改成功！');
    }







    public function destroy()
    {

    }
}
