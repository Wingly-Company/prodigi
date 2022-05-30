<?php

namespace Wingly\Prodigi\Tests;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Wingly\Prodigi\Events\WebhookProcessed;
use Wingly\Prodigi\Order;

class WebhooksTest extends TestCase
{
    public function test_dispatches_webhook_processed_event(): void
    {
        Event::fake([WebhookProcessed::class]);

        $order = Order::create($this->orderPayload());

        $payload = [
            'specversion' => '1.0',
            'type' => 'com.prodigi.order.status.stage.changed#InProgress',
            'source' => 'http://api.prodigi.com/v4.0/Orders/',
            'id' => 'evt_305174',
            'time' => '2020-08-14T11:51:01.55Z',
            'datacontenttype' => 'application/json',
            'data' => ['order' => ['id' => $order->id]],
            'subject' => 'ord_1469466',
        ];

        $this->postJson($this->getSignedUrl(), $payload)->assertOk();

        Event::assertDispatched(WebhookProcessed::class, function (WebhookProcessed $event) use ($order) {
            return $order->id === $event->order->id;
        });
    }

    public function test_returns_normal_response_for_invalid_orders(): void
    {
        $this->postJson($this->getSignedUrl(), ['id' => 'foo'])->assertOk();
    }

    public function test_it_doesnt_dispatch_webhook_processed_event_for_invalid_orders(): void
    {
        Event::fake([WebhookProcessed::class]);

        $this->postJson($this->getSignedUrl(), ['id' => 'foo'])->assertOk();

        Event::assertNotDispatched(WebhookProcessed::class);
    }

    public function test_it_returns_normal_response_when_signature_matches(): void
    {
        $this->postJson($this->getSignedUrl())->assertOk();
    }

    public function test_it_aborts_when_signature_does_not_match(): void
    {
        $this->postJson('prodigi/webhook?signature=fail')->assertStatus(403);
    }

    public function test_it_aborts_when_signature_is_missing(): void
    {
        $this->postJson('prodigi/webhook')->assertStatus(403);
    }

    protected function getSignedUrl(): string
    {
        return URL::signedRoute('prodigi.webhook');
    }
}
