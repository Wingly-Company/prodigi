<?php

namespace Wingly\Prodigi\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\URL;

class SignWebhookURL extends Command
{
    protected $signature = 'prodigi:sign';

    protected $description = 'Generates a signed URL to add to the Prodigi dashboard.';

    public function handle()
    {
        $url = URL::signedRoute('prodigi.webhook');

        $this->info("Grab your URL: \"{$url}\"");
    }
}
