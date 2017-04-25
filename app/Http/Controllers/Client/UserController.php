<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Client\UserModifyAvatarRequest;
use App\Http\Transformers\UserTransformer;

use Dingo\Api\Http\Request;
use Dingo\Api\Http\Response;
use Illuminate\Support\Facades\Storage;

/**
 * @resource User
 */
class UserController extends BaseController {

    /**
     * me
     *
     * get me information
     *
     * @param \Dingo\Api\Http\Request $request
     *
     * @return \Dingo\Api\Http\Response\Factory
     */
    public function me(Request $request) {
//        $user = $this->auth->user();
//        $user = \JWTAuth::user();

        $user = \JWTAuth::parseToken()->toUser();

        return $this->response->item($user, new UserTransformer());
    }

    public function modifyAvatar(UserModifyAvatarRequest $request) {
        $file = $request->file('avatar');

        // TODO:
        // 保存或上传功能应该移动到ReourceController到upload方法中
        $ext = $file->getClientOriginalExtension();
        $name = str_random(32).'.'.$ext;
        $path = $request->file('avatar')->storeAs(
            'avatars', $name
        );
        return $this->response->array([
            'name' => $name,
            'type' => 'avatar'
        ]);
    }

}