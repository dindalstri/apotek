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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();
        //Mengatur Hak Akses untuk Admin
    Gate::define('user-only', function ($user) {
        if ($user->level == 'user'){
        return true;
        }
        return false;
        });
        // //Mengatur Hak Akses untuk apoteker
        Gate::define('apoteker-only', function ($user) {
        if ($user->level == 'apoteker'){
        return true;
        }
        return false;
        });
        //Mengatur Hak Akses untuk gudang
        Gate::define('gudang-only', function ($user) {
        if ($user->level == 'gudang'){
        return true;
        }
        return false;
        });   
        //  //Mengatur Hak Akses untuk Pemilik
         Gate::define('pemilik-only', function ($user) {
            if ($user->level == 'pemilik'){
            return true;
            }
            return false;
            });   
        
            //  //Mengatur Hak Akses untuk Pemilik
         Gate::define('kasir-only', function ($user) {
            if ($user->level == 'kasir'){
            return true;
            }
            return false;
            });   
    } 
}