<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'comment' => ['required','string','max:2000']
        ];
    }

    public function messages()
    {
        return [
            'comment.string' => 'コメントは文字列で入力してください',
            'comment.max' => 'コメントは2,000文字以下で入力してください',
            'comment.required' => 'コメントを入力してください',
        ];
    }
}
