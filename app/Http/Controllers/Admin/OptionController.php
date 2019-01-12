<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\admin\OptionType;
use App\Models\admin\OptionCatalog;
use App\Models\admin\Option;
use Illuminate\Support\Facades\DB;

class OptionController extends Controller
{
    protected $nav_active;

    public function __construct()
    {
        $this->nav_active = 'Option';
    }

    public function index(){
        $data['nav_active'] = $this->nav_active;
        return view('admin.option.index',$data);
    }

    public function getData(){
        $data['option_type'] = OptionType::all();
        $data['option_catalog'] = OptionCatalog::with('optionType')->get();
        return $this->response($data,'success','数据请求成功！');
    }

    public function getOption(OptionCatalog $optionCatalog,Request $request){
        $data = Option::where('option_catalog_id',$optionCatalog->id)->get();
        return $this->response($data,'success','请求成功！');
    }

    public function addOptionCatalog(Request $request){
        $data = $request->input('data');
        $optionCatalog = OptionCatalog::create([
                    'option_type_id'=>$data['option_type_id'],
                    'title' =>$data['title']
                ]);
        $optionCatalog->option_type = OptionType::where('id',$data['option_type_id'])->first();
        return $this->response($optionCatalog,'success','添加成功！');
    }

    public function add(Request $request){
        $option = Option::create($request->all());
        return $this->response($option,'success','添加成功！');
    }


    public function edit(Option $option,Request $request){
        $options = $option->update($request->all());
        return $this->response($option,'success','修改成功！');
    }

    public function destory(Option $option){
        $option->delete();
        return $this->response([],'success','删除成功！');
    }

    public function editOptionCatalog(Request $request,OptionType $optionType){
        $data = $request->input('data');
        $optionTypes = OptionCatalog::where('id',$optionType->id)->update([
            'title' => $data['title']
        ]);
        return $this->response($optionTypes,'success','修改成功！');
    }


//    public function add(Request $request){
//
//        $data = $request->input('data');
//
//        DB::transaction(function() use ($data){
//            $optionCatalog = OptionCatalog::create([
//                    'option_type_id'=>$data['option_type_id'],
//                    'title' =>$data['title']
//                ]
//            );
//
//            if($data['option']){
//                foreach ($data['option'] as $val){
//                    Option::create([
//                            'title'=>$val->title,
//                            'option_catalog_id'=> $optionCatalog->id
//                        ]
//                    );
//                }
//            }
//            return $this->response($optionCatalog,'success','添加成功！');
//        });
//
//
//        return $this->response(array(), 'success', '添加失败!');
//
//
//    }

}
