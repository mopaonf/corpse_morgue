<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Obituary;
use App\Policies\ObituaryPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Obituary::class => ObituaryPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
