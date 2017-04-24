<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\BaseController;
use App\Http\Transformers\PageTransformer;
use App\Models\Page;

use Dingo\Api\Http\Request;

/**
 * @resource Page
 */
class PageController extends BaseController {

    /**
     * item
     *
     * get post detail
     *
     * @param \Dingo\Api\Http\Request $request
     *
     * @return \Dingo\Api\Http\Response\Factory
     */
    public function item(Request $request, $id) {
        $page = Page::find($id);

        return $this->response->item($page, new PageTransformer());
    }

}