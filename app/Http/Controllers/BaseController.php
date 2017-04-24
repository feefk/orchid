<?php

namespace App\Http\Controllers;

use Dingo\Api\Routing\Helpers;
use League\Fractal\Manager as FractalManager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class BaseController extends Controller
{
    use Helpers;

    public function __construct(FractalManager $fractal) {
        $this->fractal = $fractal;
    }

    public function createDataToItem($data = null, $transformer = null) {
        return $this->fractal->createData(new Item($data, $transformer))->toArray();
    }

    public function createDataToArray($data = null, $transformer = null) {
        return $this->fractal->createData(new Collection($data, $transformer))->toArray();
    }

    public function createPaginateData($data = null, $transformer = null){
        return $this->response->collection($data, $transformer);
    }
}
