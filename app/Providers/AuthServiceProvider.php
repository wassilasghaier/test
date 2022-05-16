<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();
        //defin scopes
        Passport::tokensCan([
            'admin' => 'Super admin User Type',
            'utilisateur' => 'Add/Edit/Delete Users',
            'coach' => 'simple manipulation',
            'adherent' => 'Add/Edit/Delete adherent',
            'super_coach' => 'Add/Edit/Delete',
        ]);
        Passport::setDefaultScope([
            'utilisateur'
        ]);
    }
}
