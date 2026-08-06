<?php

use App\Providers\AppServiceProvider;

return [
    AppServiceProvider::class,
    App\Providers\BladeDirective::class,
    App\Providers\EventListnerProvider::class,
    App\Providers\GatePolicyProvider::class,
    App\Providers\HorizonServiceProvider::class,
    App\Providers\RepositoryProvider::class,
    App\Providers\TenancyServiceProvider::class,
    App\Providers\TenantServiceProvider::class,
];
