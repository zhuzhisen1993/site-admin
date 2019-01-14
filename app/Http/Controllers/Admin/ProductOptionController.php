<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\ProductOption;

class ProductOptionController extends Controller
{
    protected $nav_active;
    public function __construct(){
        $this->nav_active = 'Product';
    }
    public function index(){
        $data['nav_active'] = $this->nav_active;
        return view('admin.product.productOption',$data);
    }

    public function getData(){
        $data['ProductOption'] = ProductOption::all();
        return $this->response($data,'success','获取成功！');
    }

    public function add(Request $request){
        $data = $request->input('data');

    }

    public function edit(){

    }

    public function destory(){

    }

}
