<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'title' => 'required|max:200',
            'pageContent' => 'required|max:1000000',
        ];
    }
    
    public function messages() {
    return [
        'title.required' => 'Это обязательное поле',
        'name.max' => 'Слишком много символов для этого поля',
        'pageContent.required' => 'Это обязательное поле',
        'pageContent.max' => 'Слишком много символов для этого поля',
        ];
    }
}
