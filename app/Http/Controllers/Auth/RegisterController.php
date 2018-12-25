<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'captcha' => 'captcha',
        ], [
            'name.required' => 'Введите имя пользователя',
            'name.max' => 'Имя пользователя должно быть не длиннее 255 символов',
            'email.required' => 'Введите адрес электронной почты',
            'email.email' => 'Введите корректный адрес электронной почты',
            'email.max' => 'Адрес электронной почты не должен превышать в длину 255 символов',
            'email.unique' => 'Пользователь с таким адресом электронной почты уже зарегистрирован',
            'password.requred' => 'Введите пароль',
            'password.min' => 'Пароль должен быть не менее 6 символов',
            'password.confirmed' => 'Поля Пароль и Подтверждение должны совпадать',
            'csaptcha.captcha' => 'Введены не те символы',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
