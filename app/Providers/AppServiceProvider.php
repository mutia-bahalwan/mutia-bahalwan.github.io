<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('validKontak', function ($attribute, $value, $parameters, $validator) {
            // Pastikan nilai hanya terdiri dari angka
            if (!ctype_digit($value)) {
                return false;
            }
        
            // Pastikan panjang kontak antara 10 hingga 15 karakter
            $length = strlen($value);
            if ($length < 10 || $length > 15) {
                return false;
            }
        
            return true;
        });

        Validator::extend('validPassword', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[a-zA-Z0-9]+$/', $value);
        });
    }
}
