<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        Gate::define('login', function () {
            if(isset(Auth::user()->id)){
                return true;
            }else{
                return false;
            }
        });
        Gate::define('cliente', function () {
            return Auth::user()->permission->cliente;
        });
        Gate::define('funcionario', function () {
            return Auth::user()->permission->funcionario;
        });
        Gate::define('gerente', function () {
            return Auth::user()->permission->gerente;
        });
        Gate::define('administrador', function () {
            return Auth::user()->permission->administrador;
        });
    }
}
