<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:api');


$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->get('/hello', function () {
        return "hello";
    });

    $api->group(['namespace' => 'App\Http\Controllers\Auth'], function ($api) {
        $api->post('auth/login', 'LoginController@login');
        $api->post('auth/register', 'RegisterController@register');
    });

    $api->group(['namespace' => 'App\Http\Controllers\Common'], function ($api) {
        $api->get('resource/{name}', 'ResourceController@download');
    });

    $api->group(['namespace' => 'App\Http\Controllers\Client'], function ($api) {
        $api->group([ 'middleware' => ['jwt.auth']], function ($api) {
            $api->get('user/me', 'UserController@me');

            $api->post('user/modify-avatar', 'UserController@modifyAvatar');
        });
    });

    $api->group(['namespace' => 'App\Http\Controllers\Client'], function ($api) {
        $api->group([ 'middleware' => ['jwt.auth']], function ($api) {
            $api->get('page/all', 'PageController@all');
            $api->post('page/create', 'PageController@create');
            $api->get('page/item/{id}', 'PageController@item');
            $api->post('page/update/{id}', 'PageController@update');
            $api->post('page/delete/{id}', 'PageController@delete');
        });
    });


});