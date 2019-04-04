<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Infomation;
use Illuminate\Http\Request;

class InformationController extends Controller
{


    protected $nav_active;

    public function __construct()
    {
        $this->nav_active = 'infomation';
    }

    public function index(){
        $data['nav_active'] = $this->nav_active;
        $data['infomation'] = Infomation::find(1);
        return view('admin.information.index',$data);
    }

    public function edit(Request $request,Infomation $infomation){
        $data = $request->input('data');
        $infomations = Infomation::where('id',$infomation->id)->update($data);
        return $this->response($infomations,'success','修改成功！');
    }

}