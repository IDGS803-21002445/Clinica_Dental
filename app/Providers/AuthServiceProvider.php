<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('role-admin', fn ($user) => ($user->rol ?? null) === 'admin');
        Gate::define('role-dentista', fn ($user) => ($user->rol ?? null) === 'dentista');
        Gate::define('role-recepcionista', fn ($user) => ($user->rol ?? null) === 'recepcionista');

        Gate::define('mod-usuarios', fn ($user) => ($user->rol ?? null) === 'admin');
        Gate::define('mod-personal', fn ($user) => ($user->rol ?? null) === 'admin');
        Gate::define('mod-recepcion', fn ($user) => in_array(($user->rol ?? null), ['admin', 'recepcionista'], true));
        Gate::define('mod-clinica', fn ($user) => in_array(($user->rol ?? null), ['admin', 'dentista'], true));
    }
}
