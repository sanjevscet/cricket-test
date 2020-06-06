<?php

namespace App\Library;


class BaseResponseModel {

    public static function response($message, $data, $errors = [], $status = true)
    {
        $errObj = new \stdClass();
        foreach ($errors as $key => $error) {
            $errObj->$key = is_array($error) ? $error[0] : $error;
        }

        $errorCode = $status ? 200 : 422;
        $result = [
            "message" => $message,
            "status" => $status,
            "data" => $data,
            "errors" => $errObj,
        ];

        return response()->json($result, $errorCode);
    }

    public static function success(string $message) {
        return BaseResponseModel::response($message, null);
    }
}