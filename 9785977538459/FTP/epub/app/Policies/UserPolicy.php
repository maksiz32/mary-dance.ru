<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserPolicy {
  use HandlesAuthorization;
  
  public function manipulate(User $user) {
    return $user->role == "m";
  }
}
