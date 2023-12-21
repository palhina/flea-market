<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'email' => ['required','email','max:191'],
            'password' => ['required','min:8','max:191'],
        ];
    }
    public function messages()
    {
        return [
        'email.required' => 'メールアドレスを入力してください',
        'email.email' => 'メールアドレスを入力してください',
        'email.max' => 'メールアドレスは191文字以下で入力してください',
        'password.required' => 'パスワードを入力してください',
        'password.min' => 'パスワードは8文字以上191文字以下で入力してください',
        'password.max' => 'パスワードは8文字以上191文字以下で入力してください'
        ];
    }
}
