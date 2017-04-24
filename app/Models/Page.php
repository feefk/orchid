<?php

namespace App\Models;

class Page extends BaseModel
{
    protected $fillable = [
        'author_id',
        'title',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'author_id');
    }


}

