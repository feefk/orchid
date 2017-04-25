<?php

namespace App\Http\Transformers;

use App\Models\Page;
use League\Fractal\TransformerAbstract;

class PageTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'user'
    ];

    public function transform(Page $page){
        return [
            'id' => $page->id,
            'title' => $page->title,
            'body' => $page->body,
            'keywords' => $page->meta_keywords,
        ];
    }

    public function includeUser(Page $page){
        $user = $page->user;
        return $this->item($user, (new UserTransformer()));
    }
}