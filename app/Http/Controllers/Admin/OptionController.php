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
        $data['option_catalog'] = OptionCatalog::all();
        return $this->response($data,'success','数据请求成功！');
    }

    public function getOption(OptionCatalog $optionCatalog,Request $request){
        $data = Option::where('option_catalog_id',$optionCatalog->id)->get();
        return $this->response($data,'success','请求成功！');
    }

    public function edit(Request $request){
        $data = $request->input('data');
        $option = Option::all();

        DB::transaction(function () use($option,$data) {
            $optionCatalog = OptionCatalog::where('id', $data['id'])->update([
                    'option_type_id' => $data['option_type_id'],
                    'title' => $data['title']
                ]
            );
            foreach ($option as $val) {
                $options[$val->id] = $val;
            }
            if ($data['option']) {
                foreach ($data['option'] as $val) {
                    if (isset($options[$val->id])) {
                        Option::where('id', $val->id)->update([
                            'title' => $val->title
                        ]);
                    } else {
                        Option::create(['title' => $val->title]);
                    }
                }
            }
            return $this->response($optionCatalog, 'success', '操作成功!');
        });

        return $this->response(array(), 'success', '修改失败!');

    }

    public function add(Request $request){

        $data = $request->input('data');

        DB::transaction(function() use ($data){
            $optionCatalog = OptionCatalog::create([
                    'option_type_id'=>$data['option_type_id'],
                    'title' =>$data['title']
                ]
            );

            if($data['option']){
                foreach ($data['option'] as $val){
                    Option::create([
                            'title'=>$val->title,
                            'option_catalog_id'=> $optionCatalog->id
                        ]
                    );
                }
            }
            return $this->response($optionCatalog,'success','添加成功！');
        });


        return $this->response(array(), 'success', '添加失败!');


    }

}
