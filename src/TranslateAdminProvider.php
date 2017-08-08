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
        //$this->loadViewsFrom(__DIR__.'/views', 'translate_admin');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/vendor/translate_admin'),
            __DIR__.'/resources' => base_path('public'),
            __DIR__.'/seeds' => base_path('database/seeds')
        ]);

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\BereczkyBalazs\WaaviTranslateAdmin\Interfaces\RequestDataTransformerInterface::class, \BereczkyBalazs\WaaviTranslateAdmin\Transformers\TranslateRequestDataTransformer::class);
        $this->app->bind(\BereczkyBalazs\WaaviTranslateAdmin\Interfaces\ResponseDataTransformerInterface::class, \BereczkyBalazs\WaaviTranslateAdmin\Transformers\TranslateResponseDataTransformer::class);
        $this->app->bind(\BereczkyBalazs\WaaviTranslateAdmin\Interfaces\TranslationRepositoryInterface::class, \BereczkyBalazs\WaaviTranslateAdmin\Repositories\TranslationRepository::class);
        $this->app->bind(\BereczkyBalazs\WaaviTranslateAdmin\Interfaces\LanguagesRepositoryInterface::class, \BereczkyBalazs\WaaviTranslateAdmin\Repositories\LanguagesRepository::class);
        $this->app->make('BereczkyBalazs\WaaviTranslateAdmin\Controllers\TranslateAdminController');
    }
}
