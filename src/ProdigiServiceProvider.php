<?php

namespace Wingly\Prodigi;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class ProdigiServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerPublishing();
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
}
