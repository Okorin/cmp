<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Role;
use App\Policies\RolePolicy;
use App\Cycle;
use App\MenteeCheckup;
use App\Policies\CyclePolicy;
use App\Policies\MenteeCheckupPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Role::class => RolePolicy::class,
        Cycle::class => CyclePolicy::class,
        MenteeCheckup::class => MenteeCheckupPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */

    public function boot()
    {
        $this->registerPolicies();


        //
    }
}
