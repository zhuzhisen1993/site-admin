<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\AdminRepository;

class ArticleController extends Controller
{
    //文章列表页面
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.articles.index');
    }

    public function getData(){

        //$data['article_type'] =
        //return $this->response($data);
    }


    public function destroy()
    {

    }
}
