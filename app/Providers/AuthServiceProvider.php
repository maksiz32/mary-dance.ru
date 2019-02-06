<?php
namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    
    protected $policies = [
        'App\User' => 'App\Policies\UserPolicy',
        'App\OurNews' => 'App\Policies\NewsPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
