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

    $api->group(['namespace' => 'App\Http\Controllers\Client'], function ($api) {
        $api->group([ 'middleware' => ['jwt.auth']], function ($api) {
            $api->get('user/all', 'UserController@all');
            $api->get('user/me', 'UserController@me');


            $api->get('page/item/{id}', 'PageController@Item');
        });
    });

});