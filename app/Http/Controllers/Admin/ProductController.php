<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\Product;
use App\Models\admin\ProductCatalog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    protected $nav_active;

    public function __construct()
    {
        $this->nav_active = 'Product';
    }

    public function index(){
        $data['nav_active'] = $this->nav_active;
        return view('admin.product.product',$data);
    }

    public function getData(){
        $data['catalog'] = ProductCatalog::all();
        $data['product'] = Product::all();
        return $this->response($data,'success','获取数据成功');
    }

    public  function add(Request $request){
        $data = $request->input('data');
        if($data){
           $product = Product::create($request->all());
            return $this->response($product,'success','添加成功！');
        }else{
            return $this->response([],'error','提交内容不正确！');
        }

    }

    public function edit(Product $product,Request $request){
        $products = $product->update($request->all());
        return $this->response($product,'success','修改成功！');
    }

    public  function destory(Product $product,Request $request){
        $product->update([
            'isshow'=>$request->input('data.isshow')
        ]);
    }

}
