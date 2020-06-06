<?php

namespace App\Http\Requests;

use App\Library\Constants;
use App\Library\BaseResponseModel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $message = Constants::InvalidRequest;
        $errors = $validator->messages()->get('*');
        $data = [];
        $status = false;

        $response = BaseResponseModel::response($message, $data, $errors, $status);

        throw new ValidationException($validator, $response);
    }
}
