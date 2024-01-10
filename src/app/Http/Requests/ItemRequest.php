<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'category_name' => ['required'],
            'condition_name' => ['required'],
            'name' => ['required', 'string','max:191'],
            'comment' => ['required', 'string','max:2000'],
            'price' => ['required', 'integer','max:99999999'],
        ];
    }

    public function messages()
    {
        return [
            'category_name.required' => 'カテゴリーは1つ以上入力してください',
            'condition_name.required' => '商品の状態を入力してください',        
            'name.required' => '商品名を入力してください',
            'name.string' => '商品名は文字列で入力してください',
            'name.max' => '商品名は191文字以下で入力してください',
            'comment.required' => '商品の説明を入力してください',
            'comment.string' => '商品の説明は文字列で入力してください',
            'comment.max' => '商品の説明は2000文字以下で入力してください',
            'price.required' => '販売価格を入力してください',
            'price.integer' => '販売価格は10桁以下の半角数字で入力してください',
            'price.max' => '販売価格は1億円未満で入力してください',
        ];
    }
}
