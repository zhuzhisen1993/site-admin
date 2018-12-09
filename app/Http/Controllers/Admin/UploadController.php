<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Handlers\ImageUploadHandler;
use App\Models\admin\User;

class UploadController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request,ImageUploadHandler $uploader)
    {

        $file = $request->file('file');
        if ($file) {
            $uploader->save($file, 'avatars','1','360');
        }

    }


}
