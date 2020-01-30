<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Auth;

class UserRequest extends FormRequest
{
    private $file_size_kilobite = 2 * 1024;

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
            'name' => ['required', 'alpha_num', 'min:2', 'max:255', Rule::unique('users')->ignore(Auth::user()->id)],
            'phone_number' => ['nullable', 'integer'], // integer->整数のみ(0から始まる数値も可)
            'email' => ['required', 'string','email', 'max:255', Rule::unique('users')->ignore(Auth::user()->id)],
            'password' => ['nullable','string', 'min:8', 'confirmed'], // password空欄時はvalidate素通り
            'image' => ['image', "max:$this->file_size_kilobite"]
        ];
    }

    public function attributes()
    {
        return [
            'image' => 'プロフィール画像',
        ];
    }

    public function messages()
    {
        $file_size_megabite = $this->file_size_kilobite / 1024;
        return [
            'image.max'    => ":attributeは${file_size_megabite} MB以下のファイルにしてください。",
        ];
    }
}
