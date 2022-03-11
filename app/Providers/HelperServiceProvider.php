<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Require all helper files.
        foreach ( glob( app_path( 'Helpers/*.php' ) ) as $helperFile ) {
            require_once( $helperFile );
        }
    }
}
