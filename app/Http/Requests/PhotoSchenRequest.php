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
            'photo' => 'required|max:10000',
            'photo.*' => 'mimes:jpeg,jpg,bmp,png',
        ];
    }
    
    public function messages() {
        return [
            'photo.required' => 'Это обязательное поле',
            'photo.max' => 'Не более 10 Мбайт',
            'photo.mimes' => 'Только следующий тип файла jpg, bmp, png'
        ];
    }
    
}
