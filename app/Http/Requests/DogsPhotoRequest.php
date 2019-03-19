<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DogsPhotoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [            
            'photo' => 'required|max:5000',
            'photo.*' => 'mimes:jpeg,jpg,bmp,png',
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
