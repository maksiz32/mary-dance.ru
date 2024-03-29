<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserController extends Controller {
  public function __construct() {
    $this->middleware("auth");
  }
  
  public function index() {
    $users = User::select("id", "email", "name", "role")->orderBy("email")->get();
    return view("users.index", ["users" => $users]);
  }
   

  public function input(User $user) {
    return view("users.input", ["user" => $user]);
  }

  public function save(UserRequest $request) {
    $user = User::findOrFail($request->id);
    $request->password = bcrypt($request->password);
    $user->fill($request->all())->save();
    return redirect()->action("UserController@index")
    ->with("status", "Пользователь " . $user->name . " исправлен");
  }

  public function destroy(User $user) {
    $name = $user->name;
    $user->delete();
    return redirect()->action("UserController@index")
    ->with("status", "Пользователь " . $name . " удалён");
  }
 
}
