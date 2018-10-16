<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'password' => array(
                'required',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'
            ),
            'email' => 'required|email',
            'token' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'password.regex' => 'The password format is invalid. Password must contain at least 8 character with one uppercase letter, one numberic and one symbol. ',
            'password.min' => 'The password format is invalid. Password must contain at least 8 character with one uppercase letter, one numberic and one symbol. '
        ];
    }
}
