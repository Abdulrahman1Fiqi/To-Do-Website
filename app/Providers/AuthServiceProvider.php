<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Todo;
use App\Policies\TodoPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    protected $policies =[
        Todo::class=>TodoPolicy::class,
    ];
    
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
                $this->registerPolicies();

    }
}
