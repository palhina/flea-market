<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailRequest extends FormRequest
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
            'email_address' => ['required'],
            'subject' => ['required','string','max:100'],
            'message' => ['required','string','max:2000']
        ];
    }
    
    public function messages()
    {
        return [
            'email_address.required' => '送信先を選択してください',
            'subject.required' => 'タイトルを入力してください',
            'subject.string' => 'タイトルは文字列で入力してください',
            'subject.max' => 'タイトルは100文字以下で入力してください',
            'message.required' => 'メール本文を入力してください',
            'message.string' => 'メール本文は文字列で入力してください',
            'message.max' => 'メール本文は2000文字以下で入力してください',
        ];
    }
}
