<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Auth;

class UserRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:2', 'max:255', Rule::unique('users')->ignore(Auth::user()->id)],
            'phone_number' => ['required', 'string'],
            'email' => ['required', 'string','email', 'max:255', Rule::unique('users')->ignore(Auth::user()->id)],
            'password' => ['nullable','string', 'min:8', 'confirmed'] // password空欄時はvalidate素通り
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'ユーザ名'
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
