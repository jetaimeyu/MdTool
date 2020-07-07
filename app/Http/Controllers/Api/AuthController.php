<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\JsonResponse;
use App\Http\Requests\Api\AuthorizationRequest;
use Facade\FlareClient\Api;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use JsonResponse;
    public function __construct()
    {
//        $this->middleware('auth:api', ['except'=>'login']);
    }

    public function login(AuthorizationRequest $request)
    {
        $credentials['name']=$request->name;
        $credentials['password']=$request->password;
        if (!$token = auth('api')->attempt($credentials)){
            return $this->jsonFail('用户名或密码错误！');
        }
        return $this->responseWithToken($token);
    }

    public function me()
    {
        return response()->json(auth('api')->user());
        
    }

    public function logout()
    {
        auth('api')->logout();

        return $this->jsonSuccess();

    }

    protected function responseWithToken($token){
        return $this->jsonSuccess(['access_token'=>$token, 'token_type'=>'bearer','userInfo'=>auth('api')->user(), 'expires_in'=>auth('api')->factory()->getTTL()*60]);
    }
}
