<?php

namespace App\Http\Requests\Client;


use App\Http\Requests\Request;

class PageUpdateRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|between:1,50|string',
            'content' => 'required|between:1,10000',
        ];
    }
}
