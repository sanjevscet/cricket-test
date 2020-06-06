<?php

namespace App\Http\Requests;

use App\Library\Constants;
use App\Library\BaseResponseModel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class TeamRequest extends FormRequest
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
        $id = $this->team;
        return [
            'name' => 'required|min:3|max:64|unique:teams,name,'.$id,
            'logo_uri' => 'required|url|max:255|unique:teams,logo_uri,'.$id,
            'club' => 'required|min:3|max:64',
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
