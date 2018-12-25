<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }
    
    protected function validateLogin(Request $request) {
    $this->validate($request, [
      $this->username() => 'required', 'password' => 'required',
    ], [
      $this->username() . '.required' => 'Введите адрес электронной почты',
      'password.required' => 'Введите пароль',
    ]);
  }

  protected function sendFailedLoginResponse(Request $request) {
    return redirect()->back()
    ->withInput($request->only($this->username(), 'remember'))
    ->withErrors([
      $this->username() => 'Пользователь с таким адресом электронной почты ' .
      'отсутствует в списке',
    ]);
  }
}
