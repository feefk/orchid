<?php

namespace App\Http\Requests;

use Dingo\Api\Http\FormRequest;


/*
 * help doc:
 * https://ericlbarnes.com/2015/04/04/laravel-array-validation/
 * */
abstract class Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

}
