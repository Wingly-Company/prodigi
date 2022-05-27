<?php

namespace Wingly\Prodigi\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Wingly\Prodigi\ProdigiServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [ProdigiServiceProvider::class];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('prodigi.apiKey', getenv('PRODIGI_API_KEY'));

        $app['config']->set('prodigi.api', 'sandbox');
    }
}
