<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\BaseController;
use App\Http\Transformers\UserTransformer;
use App\Models\User;

use App\Http\Requests\PageDataRequest;
use Dingo\Api\Http\Request;

/**
 * @resource User
 */
class UserController extends BaseController {

    /**
     * all
     *
     * list all users
     *
     * @param \Dingo\Api\Http\Request $request
     *
     * @return \Dingo\Api\Http\Response\Factory
     */
    public function all(PageDataRequest $request) {
        $size = $request->get('size');
        $users = User::all();

        return $this->response->collection($users, new UserTransformer());
    }

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

}