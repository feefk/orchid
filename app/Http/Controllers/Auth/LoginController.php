<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

/**
 * @resource Login
 */
class LoginController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * login
     *
     * login
     *
     * @param \Dingo\Api\Http\Request $request
     *
     * @return \Dingo\Api\Http\Response\Factory
     */
    public function login(LoginRequest $request)
    {
        $loginName = $request->get('login_name');
        $password = $request->get('password');

        $credentials = [
            'email' => $loginName,
            'password' => $password
        ];

        try {
            $token = \JWTAuth::attempt($credentials);

            if (!$token){
                throw new \Exception('用户名或密码错误!', 1011);
            }
        } catch (JWTException $e){
            throw new \Exception('用户名或密码错误!', 1011);
        }

        $return = compact('token');

        return $this->response->array($return);
    }

}
