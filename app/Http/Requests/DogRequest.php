<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DogRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'sex' => 'required|integer|max:1',
            'name' => 'required|max:30',
            'date_age' => 'required',
            'sale' => 'required|integer|max:1',
        ];
    }
    
    public function messages() {
    return [
        'sex.required' => 'Надо обязательно указать пол',
        'sex.integer' => 'Здесь должно быть число',
        'sex.max' => 'Не более одного символа',
        'name.required' => 'Имя обязательно к заполнению',
        'name.max' => 'Не более 30 символов',
        'date_age.required' => 'Дата рождения обязательна к заполнению',
        'sale.required' => 'Обязательное к заполнению поле',
        'sale.integer' => 'Здесь должно быть число',
        'sale.max' => 'Не более одного символа',
    ];
  }
}
