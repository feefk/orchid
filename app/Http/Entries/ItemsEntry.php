<?php
/**
 * Created by PhpStorm.
 * User: wuhe
 * Date: 16/8/5
 * Time: 下午3:03
 */

namespace App\Http\Entries;

use Illuminate\Pagination\LengthAwarePaginator;

class ItemsEntry extends BaseEntry{

    public $paginator;

    public function __construct(LengthAwarePaginator $paginator) {
        $this->paginator = $paginator;
    }
}