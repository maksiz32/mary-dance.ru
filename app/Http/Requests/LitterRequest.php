<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LitterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'litter' => 'required|alpha|max:2',
            'idDog1' => 'required',
            'idDog2' => 'required',
        ];
    }
    
    public function messages() {
        return [
            'litter.required' => 'Это обязательное поле',
            'litter.alpha' => 'Поле должно содержать только латинские символы',
            'litter.max' => 'Слишком много символов для этого поля',
            'idDog1.required' => 'Это обязательное поле',
            'idDog2.required' => 'Это обязательное поле',
        ];
    }
}
