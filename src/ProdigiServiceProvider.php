<?php

namespace Wingly\Prodigi;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Wingly\Prodigi\Commands\SignWebhookURL;

class ProdigiServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerRoutes();
        $this->registerPublishing();
        $this->registerCommands();
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/prodigi.php', 'prodigi');

        $this->app->singleton(Prodigi::class, function ($app) {
            $client = app(Client::class);

            return (new Prodigi($client))
                ->setApiKey(config('prodigi.apiKey'))
                ->setApiUrl(config('prodigi.api'));
        });
    }

    protected function registerPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/prodigi.php' => $this->app->configPath('prodigi.php'),
            ], 'prodigi-config');
        }
    }

    protected function registerCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                SignWebhookURL::class,
            ]);
        }
    }

    protected function registerRoutes(): void
    {
        Route::group([
            'prefix' => 'prodigi',
            'namespace' => 'Wingly\Prodigi\Http\Controllers',
            'as' => 'prodigi.',
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }
}
