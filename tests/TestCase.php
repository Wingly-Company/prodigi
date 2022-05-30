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

    protected function orderPayload(array $params = []): array
    {
        return array_merge([
            'shippingMethod' => 'Overnight',
            'recipient' => [
                'name' => 'Mr Testy McTestface',
                'address' => [
                    'line1' => '14 test place',
                    'postalOrZipCode' => '12345',
                    'countryCode' => 'US',
                    'townOrCity' => 'somewhere',
                ],
            ],
            'items' => [
                [
                    'sku' => 'GLOBAL-CFPM-16X20',
                    'copies' => 1,
                    'sizing' => 'fillPrintArea',
                    'attributes' => [
                        'color' => 'black',
                    ],
                    'assets' => [
                        [
                            'printArea' => 'default',
                            'url' => 'https://pwintyimages.blob.core.windows.net/samples/stars/test-sample-grey.png',
                        ],
                    ],
                ],
            ],
        ], $params);
    }
}
