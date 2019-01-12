<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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
    
    
  protected function validationErrorMessages() {
    return [
      'email.required' => 'Укажите адрес электронной почты',
      'email.email' => 'Укажите корректный адрес электронной почты',
      'password.required' => 'Введите пароль',
      'password.min' => 'Пароль должен включать не менее 6 символов',
      'password.confirmed' => 'В полях "Пароль" и "Подтверждение пароля" следует ' .
      'указать одно и то же значение',
    ];
  }

  protected function sendResetResponse($response) {
    return redirect($this->redirectPath())
    ->with('status', 'Сброс пароля успешно выполнен');
  }

  protected function sendResetFailedResponse(Request $request, $response) {
    return redirect()->back()
    ->withInput($request->only('email'))
    ->withErrors(['email' => 'Указанный адрес электронной почты в списке отсутствует']);
  }
}
