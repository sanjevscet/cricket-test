<?php

namespace App\Http\Controllers;

use App\Library\Constants;
use App\Library\BaseResponseModel;
use App\Http\Requests\LoginRequest;

class MemberController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $errors = [];
        $data = [];

        $message = "";

        $status = true;

        if (!$token = auth('api')->attempt($credentials)) {
            $status = false;
            $message = Constants::LoginFailed;
            $errors = [
                "login" => Constants::InvalidCredentials,
            ];
        } else {
            $message = Constants::LoginSucceed;
            $data = [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth('api')->factory()->getTTL() * 60*200,
            ];
        }

        return BaseResponseModel::response($message, $data, $errors, $status);
    }
}
