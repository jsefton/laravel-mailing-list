<?php

namespace JSefton\MailingList;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class MailingListServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (is_dir(__DIR__.'/../config')) {
            $this->publishes([
                __DIR__ . '/../config/' => config_path(),
            ], 'package-feature.config');
        }

        if (is_dir(__DIR__.'/../migrations')) {
            $this->loadMigrationsFrom(__DIR__ . '/../migrations');
        }

        if (is_dir(__DIR__.'/../resources/views')) {
            $this->loadViewsFrom(__DIR__ . '/../resources/views', 'package-feature');
        }

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }
}
