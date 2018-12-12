<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(){
        return view('admin.product.product');
    }

    public function getData(Product $product){
        return $this->response($product->all(),'success','获取数据成功');
    }

    public function edit(){

    }

    public  function add(){

    }

    public  function destory(Product $product,Request $request){
        $product->update([
            'isshow'=>$request->input('data.isshow')
        ]);
    }

}
