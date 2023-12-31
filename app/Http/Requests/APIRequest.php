<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class APIRequest extends FormRequest
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
            'title' => 'required',
            'content' => 'required|min:10',
        ];
    }
    public function messages()
    {
        return [
            'content.min' => '文字最少10個字'
        ];
    }
}
