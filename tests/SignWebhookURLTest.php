<?php

namespace Wingly\Prodigi\Tests;

use Illuminate\Support\Facades\URL;

class SignWebhookURLTest extends TestCase
{
    public function test_it_generates_a_signed_url(): void
    {
        $url = URL::signedRoute('prodigi.webhook');

        $this->artisan('prodigi:sign')
            ->expectsOutput("Grab your URL: \"{$url}\"")
            ->assertExitCode(0);
    }
}
