<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'date' => 'required',
            'author' => 'required',
            'title' => 'required|max:500',
            'text' => 'required|max:2000',
        ];
    }
    
    public function messages() {
    return [
        'date.required' => 'Не создалась текущая дата',
        'author.required' => 'Не загрузился автор',
        'title.required' => 'Надо обязательно указать заголовок',
        'title.max' => 'Не более 500 символов',
        'text.required' => 'Обязательное поле',
        'text.max' => 'Не более 2000 символов',
    ];
  }
}
