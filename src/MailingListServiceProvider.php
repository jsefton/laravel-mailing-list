<?php

namespace JSefton\MailingList;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use JSefton\MailingList\Commands\MailingListCreate;
use JSefton\MailingList\Commands\MailingListList;

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
            ], 'mailing-list.config');
        }

        if (is_dir(__DIR__.'/../migrations')) {
            $this->loadMigrationsFrom(__DIR__ . '/../migrations');
        }

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        if ($this->app->runningInConsole()) {
            $this->commands([
                MailingListCreate::class,
                MailingListList::class,
            ]);
        }
    }
}
