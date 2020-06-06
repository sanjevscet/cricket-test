<?php

namespace App\Http\Requests;

use App\Library\Constants;
use App\Library\BaseResponseModel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class PlayerRequest extends FormRequest
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
        $id = $this->player;
        return [
            'first_name' => 'required|min:3|max:64',
            'last_name' => 'required|min:3|max:64',
            'image_uri' => 'required|url|max:255|unique:players,image_uri,'.$id,
            'jersey_number' => 'required|digits_between:1,2',
            'country' => 'required|min:3|max:64',
            'team_id' => 'required',
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
