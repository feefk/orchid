<?php

namespace App\Models;

class Post extends BaseModel
{
    protected $fillable = [
        'name',
        'display_name',
        'english',
        'description',
        'user_id',
    ];

}

