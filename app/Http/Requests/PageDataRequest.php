<?php

namespace App\Http\Requests;


class PageDataRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'size' => 'required|integer|min:1',
            'page' => 'required|integer|min:1',
            'sort' => 'required|in:desc,asc',
            'end_time' => 'sometimes|date',
        ];
    }
}
