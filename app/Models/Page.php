<?php

namespace App\Models;

class Page extends BaseModel
{
    protected $fillable = [
        'author_id',
        'title',
        'body',
        'slug',
        'status',
        'meta_keywords'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'author_id');
    }

    public static function newItem($array = array() , $author_id) {
        return static::create([
            'title' => $array['title'],
            'body' => $array['content'],
            'meta_keywords' => $array['keywords'],
            'slug' => 'slug'.str_random(5),
            'status' => 'ACTIVE',
            'author_id' => $author_id
        ]);
    }

    public static function updateItem($array = array() , $page_id) {
        return static::find($page_id)->update([
                'title' => $array['title'],
                'body' => $array['content'],
                'meta_keywords' => $array['keywords'],
            ]
        );
    }
}

