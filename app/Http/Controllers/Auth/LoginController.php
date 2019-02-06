<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class LoginController extends Controller {
  use AuthenticatesUsers;

  //protected $redirectTo = '/';
  protected function redirectTo(){
   return Session::get('backUrl') ? Session::get('backUrl') :   $this->redirectTo;
}

  public function __construct() {
    $this->middleware('guest', ['except' => 'logout']);
    Session::put('backUrl', URL::previous());
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
      $this->username() => 'Не верные имя пользователя или пароль',
    ]);
  }
}