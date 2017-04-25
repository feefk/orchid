<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Common\DownloadRequest;
use Dingo\Api\Http\Request;
use Illuminate\Support\Facades\Storage;


/**
 * @resource Resource
 */
class ResourceController extends BaseController
{
    /**
     * upload
     *
     * 上传文件
     *
     * @param \Dingo\Api\Http\Request $request
     *
     * @return \Dingo\Api\Http\Response\Factory
     */
    public function upload(Request $request) {
        // TODO:
        // 上传文件操作在这里


    }


    /**
     * download
     *
     * 获取文件
     *
     * @param \Dingo\Api\Http\Request $request
     *
     * @return \Dingo\Api\Http\Response\Factory
     */
    public function download(Request $request, $name) {
//        $type = $request->get('type');
        // TODO:
        // 文件类型判断

        $path = 'avatars/'.$name;
        $url = Storage::url($path);
        return response()->download(public_path().$url);

    }


}
