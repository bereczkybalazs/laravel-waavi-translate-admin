<?php

namespace BereczkyBalazs\WaaviTranslateAdmin;

use Illuminate\Support\ServiceProvider;

class TranslateAdminProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
        $this->loadViewsFrom(__DIR__.'/views', 'translate_admin');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('BereczkyBalazs\WaaviTranslateAdmin\Controllers\TranslateAdminController');
    }
}
