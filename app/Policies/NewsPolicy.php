<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\OurNews;

class NewsPolicy
{
    use HandlesAuthorization;

    public function manipulate(User $user)
    {
        return ($user->role == "a");
    }
}
