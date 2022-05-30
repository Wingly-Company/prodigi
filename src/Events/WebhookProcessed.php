<?php

namespace Wingly\Prodigi\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Wingly\Prodigi\Order;

class WebhookProcessed
{
    use Dispatchable;
    use SerializesModels;

    public function __construct(public Order $order)
    {
    }
}
