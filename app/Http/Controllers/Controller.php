<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function response($data = array(),$msg='',$tips='', $list = array(), $code = '200')
    {
        return response()->json([
            'status' => true,
            'msg' => $msg,
            'tips' => $tips,
            'error_code' => '',
            'data' => $data,
            'list' => $list
        ], $code, array(), JSON_UNESCAPED_UNICODE);
    }

}
