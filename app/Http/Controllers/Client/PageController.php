<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Client\PageCreateRequest;
use App\Http\Requests\Client\PageUpdateRequest;
use App\Http\Transformers\PageTransformer;
use App\Models\Page;

use Dingo\Api\Http\Request;

/**
 * @resource Page
 */
class PageController extends BaseController {

    /**
     * all
     *
     * get all
     *
     * @param \Dingo\Api\Http\Request $request
     *
     * @return \Dingo\Api\Http\Response\Factory
     */
    public function all(Request $request) {
        // TODO:
        // page , size 
        $pages = Page::all();

        return $this->response->collection($pages, new PageTransformer());
    }


    /**
     * create
     *
     * create one page
     *
     * @param \Dingo\Api\Http\Request $request
     *
     * @return \Dingo\Api\Http\Response\Factory
     */
    public function create(PageCreateRequest $request) {
        $page = Page::newItem($request->all(), $this->user()->id);

        return $this->response->item($page, new PageTransformer());
    }

    /**
     * item
     *
     * get Page detail
     *
     * @param \Dingo\Api\Http\Request $request
     *
     * @return \Dingo\Api\Http\Response\Factory
     */
    public function item(Request $request, $id) {
        $page = Page::find($id);

        return $this->response->item($page, new PageTransformer());
    }

    /**
     * update
     *
     * update Page detail
     *
     * @param \Dingo\Api\Http\Request $request
     *
     * @return \Dingo\Api\Http\Response\Factory
     */
    public function update(PageUpdateRequest $request, $id) {
        $status = Page::updateItem($request->all(), $id);

        if ($status) {
            $page = Page::find($id);
            return $this->response->item($page, new PageTransformer());
        } else {
            // TODO:
            // 异常处理
        }
    }

    /**
     * delete
     *
     * delete page
     *
     * @param \Dingo\Api\Http\Request $request
     *
     * @return \Dingo\Api\Http\Response\Factory
     */
    public function delete(Request $request, $id) {
        // TODO:
        // 处理异常
        Page::find($id)->delete();

        return $this->response->array([]);
    }


}