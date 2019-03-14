<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoSchenRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'photo' => 'required|image|max:5000',
        ];
    }
    
    public function messages() {
        return [
            'photo.required' => 'Это обязательное поле',
            'photo.image' => 'Допустимы только файлы изображений',
            'photo.max' => 'Не более 5 Мбайт',
        ];
    }
}
