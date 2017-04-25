<?php

namespace App\Http\Requests\Common;


use App\Http\Requests\Request;

class DownloadRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => 'sometimes|in:avatar'
        ];
    }
}
