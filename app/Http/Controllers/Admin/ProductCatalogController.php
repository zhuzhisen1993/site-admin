<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\ProductCatalog;

class ProductCatalogController extends Controller
{

    protected $nav_active;

    public function __construct()
    {
        $this->nav_active = 'Product';
    }

    public function index(){
        $data['nav_active'] = $this->nav_active;
        return view('admin.product.catalog',$data);
    }
    public function getData(){
        $arr[] = '顶级分类';
        $productCatalog = $this->getTree(ProductCatalog::all());
        foreach($productCatalog as $value){
           echo str_repeat('--', $value['level']), $value['name'].'<br />';
        }
    }

    public function add(Request $request){
        $data = $request->input('data');
        if(empty($data['id'])){
            $datas = ProductCatalog::create([
                'level'=> 0,
                'name' => $data['name'],
                'pid'  => 0,
                'isshow' => 1
            ]);
        }else{
            $datas = ProductCatalog::create([
                'level'=> $data['level']+1,
                'name' => $data['name'],
                'pid'  => $data['id'],
                'isshow' => $data['isshow']
            ]);
        }

        return $this->response($datas,'success','添加成功!');

    }

    public function edit(Request $request,ProductCatalog $productCatalog){

            $data = $request->input('data');

            $productCatalogs = ProductCatalog::where('id',$productCatalog->id)->update([
                'name' => $data['name'],
                'pid' => $data['pid'],
                'level' =>$data['level'],
                'isshow' => $data['isshow']
            ]);

            return $this->response($productCatalogs,'success','修改成功！');
    }

    public function destory(ProductCatalog $productCatalog){
        $ProductCatalogs = ProductCatalog::where('pid',$productCatalog->id)->first();
        if($ProductCatalogs){
            return $this->response(array(),'warning','该分类下有子分类,请先删除子类');
        }else{
            $productCatalog->delete();
            return $this->response(array(),'success','删除成功！');
        }
    }


    public function getTree($array, $pid =0, $level = 0){
        //声明静态数组,避免递归调用时,多次声明导致数组覆盖
        static $list = [];
        foreach ($array as $key => $value){
            //第一次遍历,找到父节点为根节点的节点 也就是pid=0的节点
            if ($value->pid == $pid){
                //父节点为根节点的节点,级别为0，也就是第一级
                $value->level = $level;
                //把数组放到list中
                $list[] = $value;
                //把这个节点从数组中移除,减少后续递归消耗
                unset($array[$key]);
                //开始递归,查找父ID为该节点ID的节点,级别则为原级别+1
                $this->getTree($array, $value->id, $level+1);

            }
        }
        return $list;
    }

    public function generateTree($array){
        //第一步 构造数据
        $items = array();
        foreach($array as $value){
            $items[$value['id']] = $value;
        }
        //第二部 遍历数据 生成树状结构
        $tree = array();
        foreach($items as $key => $item){
            if(isset($items[$item['pid']])){
                $items[$item['pid']]['son'][] = &$items[$key];
            }else{
                $tree[] = &$items[$key];
            }
        }
        return $tree;
    }


}
