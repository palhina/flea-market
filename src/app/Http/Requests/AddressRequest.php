<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'name' => ['string','max:191','nullable'],
            'postcode' => ['required', 'regex:/^[0-9]{3}-[0-9]{4}$/' ],
            'address' => ['required', 'string','max:191'],
            'building' => ['nullable','string','max:191'],
        ];
    }

    public function messages()
    {
        return [
            'name.string' => '名前は文字列で入力してください',
            'name.max' => '名前は191文字以下で入力してください',
            'postcode.required' => '郵便番号を入力してください',
            'postcode.regex' => 'メールアドレスはハイフンを入れて123-4567のように入力してください',
            'address.required' => '住所を入力してください',
            'address.string' => '住所を文字列で入力してください',
            'address.max' => '住所は191文字以下で入力してください',
            'building.string' => '建物名を文字列で入力してください',
            'building.max' => '建物名は191文字以下で入力してください',
        ];
    }
}
