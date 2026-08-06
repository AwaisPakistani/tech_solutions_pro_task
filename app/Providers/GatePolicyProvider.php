<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\MyPolicy;// If we are not saving policy in laravel by default folder then always import need otherwise in policy no need to import policy
class GatePolicyProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Dashboard options
        Gate::define('GateSuperAdmin',function(User $user){
            return $user->hasRole('Super Admin');
        });
        // View Profile either it's you or not
        Gate::define('view-my-profile',function(User $user,$Userid){
            return $user->id===$Userid;
        });


    }
}
